<?php

namespace Kanboard\Plugin\KanboardSupport\Controller;

use Kanboard\Controller\BaseController;

/**
 * Class Technical Support
 * 
 * @author aljawaid
 * 
 */
class TechnicalSupportController extends \Kanboard\Controller\ConfigController
{
	/**
     * Display the Support Page
     *
     * @access public
     */
    public function show()
    {
        $this->response->html($this->helper->layout->config('kanboardSupport:config/support', array(
            'db_size' => $this->configModel->getDatabaseSize(),
            'db_version' => $this->db->getDriver()->getDatabaseVersion(),
            'user_agent' => $this->request->getServerVariable('HTTP_USER_AGENT'),
            'title' => t('Settings').' &gt; '.t('Technical Support'),
        )));
    }

}
