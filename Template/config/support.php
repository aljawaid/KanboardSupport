<?php
    $user = $this->user->getid();
    $user2 = $this->user->getFullname();
?>
    <div class="page-header" style="margin-top: 10px;">
        <h2><?= t('Technical Support') ?></h2>
    </div>

<!-- USER CONFIGURATION -->
    <section class="support-section">
        
        <div class="table-responsive">
            <table id="UserTable" class="support-table table-center">
                <thead class="">
                    <tr class="support-table-row">
                        <th class="support-table-title" colspan="4" scope="col">
                            <i class="fa fa-user"></i> <?= t('User Configuration') ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Profile Full Name') ?></td>
                        <td class="cell-value value-name" width=""><?= $this->user->getFullname() ?></td>
                        <td class="cell-title no-border-left text-right" width="100px"><?= t('Your Role') ?></td>
                        <td class="cell-value no-border-left text-center" width="150px"><?= $this->user->getRoleName($user['role']) ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your User ID') ?></td>
                        <td class="cell-value value"><?= $this->user->getid() ?></td>
                        <td class="cell-title no-border-left text-right" width="100px"><?= t('Status') ?></td>
                        <td class="cell-value text-center" width="150px"><?= $user2['is_active'] ? t('Active') : t('Inactive') ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your IP Address') ?></td>
                        <td class="cell-value value-ip" colspan="3"><?= $_SERVER['REMOTE_ADDR'] ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Current Page') ?></td>
                        <td class="cell-value value-url" colspan="3"><?= $_SERVER['SCRIPT_URI'] ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Browser Name') ?></td>
                        <td class="cell-value" colspan="3"><?= $this->helper->supportHelper->getBrowser() ?></td>
                    </tr>
                    <tr class="support-table-row">
                        <td class="cell-title"><?= t('Your Browser') ?></td>
                        <td class="cell-value" colspan="3"><?= $this->text->e($user_agent) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


<?php if (DB_DRIVER === 'sqlite'): ?>
    <div class="page-header">
        <h2><?= t('Database') ?></h2>
    </div>
    <div class="panel">
        <ul>
            <li>
                <?= t('Database size:') ?>
                <strong><?= $this->text->bytes($db_size) ?></strong>
            </li>
            <li>
                <?= $this->url->link(t('Download the database'), 'ConfigController', 'downloadDb', array(), true) ?>&nbsp;
                <?= t('(Gzip compressed Sqlite file)') ?>
            </li>
            <li>
                <?= $this->url->link(t('Upload the database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium') ?>
            </li>
            <li>
                <?= $this->url->link(t('Optimize the database'), 'ConfigController', 'optimizeDb', array(), true) ?>&nbsp;
                <?= t('(VACUUM command)') ?>
            </li>
        </ul>
    </div>
<?php endif ?>

<div class="page-header">
    <h2><?= t('License') ?></h2>
</div>
<div class="panel">
<?= nl2br(file_get_contents(ROOT_DIR.DIRECTORY_SEPARATOR.'LICENSE')) ?>
</div>
