<?php

namespace Kanboard\Plugin\KanboardSupport\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use RuntimeException;
use ZipArchive;

/**
 * Plugin KanboardSupport
 *
 * Class TechnicalSupportController
 * @package  Kanboard/Controller
 * @author   aljawaid
 *
 * Security boundaries are covered by tests/SecurityBoundaryTest.php.
 */
class TechnicalSupportController extends BaseController
{
    /**
     * Display the Support Page
     *
     * @access public
     */
    public function show()
    {
        $this->assertAdmin();
        $this->response->html($this->helper->layout->config('kanboardSupport:config/support', array(
            'db_size' => $this->configModel->getDatabaseSize(),
            'db_version' => $this->db->getDriver()->getDatabaseVersion(),
            'user_agent' => $this->request->getServerVariable('HTTP_USER_AGENT'),
            'title' => e('Settings %s Configuration', ' &#10562; '),
        )));
    }

    /**
     * Display the Webhooks Information Page
     *
     * @access public
     */
    public function showWebhookInformation()
    {
        $this->assertAdmin();
        $this->response->html($this->helper->layout->config('kanboardSupport:config/webhook_information', array(
            'title' => e('Webhooks %s Information', ' &#10562; '),
        )));
    }

    /**
     * Display Current Raw Config File (Modal)
     *
     * @see     config.php
     * @return  modal
     * @author  aljawaid
     */
    public function showCurrentRawConfigModal()
    {
        $this->assertAdmin();
        $this->response->html($this->template->render('kanboardSupport:modals/current-raw-config', array(
            'title' => t('Current Raw Configuration File'),
        )));
    }

    /**
     * Display Default Raw Config File (Modal)
     *
     * @see     config.default.php
     * @return  modal
     * @author  aljawaid
     */
    public function showDefaultRawConfigModal()
    {
        $this->assertAdmin();
        $this->response->html($this->template->render('kanboardSupport:modals/default-raw-config', array(
            'title' => t('Default Raw Configuration File'),
        )));
    }

    /**
     * Display Debug Log (Modal)
     *
     * @see     debug.log
     * @return  modal
     * @author  aljawaid
     */
    public function showDebugLogModal()
    {
        $this->assertAdmin();
        $this->response->html($this->template->render('kanboardSupport:modals/debug-log', array(
            'title' => t('Debug Log'),
        )));
    }

    /**
     * Compress and Download Config Files
     *
     * Archive includes 'config.php' and 'config.default.php' named as 'KB_v(version)_Config_Backup-(date/time).zip'
     * @see     app-sections.php
     * @return  zip archive
     * @author  Phani https://stackoverflow.com/a/20216192
     * @author  aljawaid
     */
    public function backupConfigFiles()
    {
        $this->validateAdminPostRequest();
        $filename = 'KB_v' . APP_VERSION . '_Config_Backup-' . date('d-m-Y\THi') . '.zip';
        $this->downloadZipArchive(
            array(ROOT_DIR . DIRECTORY_SEPARATOR . 'config.php', ROOT_DIR . DIRECTORY_SEPARATOR . 'config.default.php'),
            $filename
        );
    }

    /**
     * Compress and Download Debug Log File
     *
     * Archive includes 'debug.log' named as 'KB_v(version)_Debug_Backup-(date/time).zip'
     * @see     app-sections.php
     * @return  zip archive
     * @author  Phani https://stackoverflow.com/a/20216192
     * @author  aljawaid
     */
    public function downloadDebugFile()
    {
        $this->validateAdminPostRequest();
        $filename = 'KB_v' . APP_VERSION . '_Debug_Backup-' . date('d-m-Y\THi') . '.zip';
        $this->downloadZipArchive(array(LOG_FILE), $filename);
    }

    /**
     * Download Raw Debug Log File
     *
     * @see     app-sections.php
     * @return  download debug.log
     * @author  aljawaid
     */
    public function downloadRawDebugFile()
    {
        $this->validateAdminPostRequest();

        if (!is_file(LOG_FILE) || !is_readable(LOG_FILE)) {
            $this->flash->failure(t('Unable to download the log file. Check that the file exists.'));
            $this->redirectToSupport();
            return;
        }

        $filename = 'KB_v' . APP_VERSION . '-' . date('d-m-Y\THi') . '-debug.log';
        $this->downloadFileSnapshot(LOG_FILE, $filename, 'text/plain; charset=utf-8');
    }

    /**
     * Delete the Debug Log File
     *
     * @return  void
     * @author  aljawaid
     */
    public function deleteDebugLog()
    {
        $this->validateAdminPostRequest();

        if (is_file(LOG_FILE) && is_writable(dirname(LOG_FILE)) && unlink(LOG_FILE)) {
            $this->flash->success(t('Debug Log Deleted Successfully'));
        } else {
            $this->flash->failure(t('Unable to Delete Debug Log'));
        }

        $this->redirectToSupport();
    }

    /**
     * Enforce the defence-in-depth boundary for sensitive POST actions.
     *
     * @return void
     */
    private function validateAdminPostRequest()
    {
        $this->assertAdmin();

        if (!$this->request->isPost()) {
            throw new AccessForbiddenException();
        }

        $this->checkCSRFForm();
    }

    /**
     * Reject direct controller calls that bypass the application access map.
     *
     * @return void
     */
    private function assertAdmin()
    {
        if (!$this->userSession->isAdmin()) {
            throw new AccessForbiddenException();
        }
    }

    /**
     * Build and stream a ZIP archive from readable regular files.
     *
     * @param  array  $files
     * @param  string $filename
     * @return void
     */
    private function downloadZipArchive(array $files, $filename)
    {
        if (!class_exists(ZipArchive::class)) {
            $this->failDownload();
            return;
        }

        $zip = new ZipArchive();
        $temporaryFile = tempnam(sys_get_temp_dir(), 'kanboard-support-');

        if ($temporaryFile === false) {
            $this->failDownload();
            return;
        }

        $archiveOpen = false;

        try {
            if ($zip->open($temporaryFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                throw new RuntimeException('Unable to create ZIP archive.');
            }
            $archiveOpen = true;

            foreach ($files as $file) {
                if (!is_file($file) || !is_readable($file) || !$zip->addFile($file, basename($file))) {
                    throw new RuntimeException('Unable to add a requested file to the ZIP archive.');
                }
            }

            $archiveClosed = $zip->close();
            $archiveOpen = false;

            if (!$archiveClosed) {
                throw new RuntimeException('Unable to finish ZIP archive.');
            }

            $this->sendFileDownload($temporaryFile, $filename, 'application/zip');
        } catch (RuntimeException $exception) {
            if ($archiveOpen) {
                $zip->close();
            }
            $this->failDownload();
        } finally {
            if (is_file($temporaryFile)) {
                unlink($temporaryFile);
            }
        }
    }

    /**
     * Copy a live file to a fixed snapshot before calculating download headers.
     *
     * @param  string $sourcePath
     * @param  string $filename
     * @param  string $contentType
     * @return void
     */
    private function downloadFileSnapshot($sourcePath, $filename, $contentType)
    {
        $temporaryFile = tempnam(sys_get_temp_dir(), 'kanboard-support-');

        if ($temporaryFile === false) {
            $this->failDownload();
            return;
        }

        try {
            if (!is_file($sourcePath) || !is_readable($sourcePath) || !copy($sourcePath, $temporaryFile)) {
                throw new RuntimeException('Unable to create a file snapshot.');
            }

            $this->sendFileDownload($temporaryFile, $filename, $contentType);
        } catch (RuntimeException $exception) {
            $this->failDownload();
        } finally {
            if (is_file($temporaryFile)) {
                unlink($temporaryFile);
            }
        }
    }

    /**
     * Stream a file with private, non-sniffable download headers.
     *
     * @param  string $path
     * @param  string $filename
     * @param  string $contentType
     * @return void
     */
    private function sendFileDownload($path, $filename, $contentType)
    {
        $filesize = filesize($path);

        if ($filesize === false) {
            $this->failDownload();
            return;
        }

        $this->response
            ->withoutCache()
            ->withSecurityHeaders()
            ->withFileDownload($filename)
            ->withContentType($contentType)
            ->withHeader('Cache-Control', 'no-store, private')
            ->withHeader('Content-Length', (string) $filesize)
            ->send();

        readfile($path);
    }

    /**
     * Report a download preparation failure without disclosing server paths.
     *
     * @return void
     */
    private function failDownload()
    {
        $this->flash->failure(
            t('Unable to create the requested download. Check the file and temporary folder permissions.')
        );
        $this->redirectToSupport();
    }

    /**
     * Return to the masked support overview.
     *
     * @return void
     */
    private function redirectToSupport()
    {
        $this->response->redirect(
            $this->helper->url->to('TechnicalSupportController', 'show', array('plugin' => 'KanboardSupport'))
        );
    }
}
