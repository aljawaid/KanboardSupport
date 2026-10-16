<span class="data-wrap">
    <li class="app-info-title"><?= e('%s Authentication', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
    <?php if (LDAP_AUTH == false): ?>
        <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
            <?= t('Disabled') ?>
        </li>
        <span class="fail-x" title="<?= t('This is the default setting') ?>">&#10008;</span>
        <li class="form-help"><?= t('Enable LDAP in your configuration file to display the related settings.') ?></li>
    <?php else: ?>
        <li class="app-info-value border-bottom-thick">
            <?= t('Enabled') ?>
        </li>
        <span class="pass-tick">&#10004;</span>
    <?php endif ?>
</span>
<?php if (LDAP_AUTH == true): ?>
    <span class="data-wrap">
        <li class="app-info-title"><?= e('%s Server', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
        <?php if (LDAP_SERVER != ''): ?>
            <?php if ($this->user->isAdmin()): ?>
                <li class="app-info-value value-path border-bottom-thick privacy">
                    <?= LDAP_SERVER ?>
                </li>
            <?php else: ?>
                <li class="app-info-value value-path border-bottom-thick">
                    <?= $this->helper->supportHelper->maskServer(LDAP_SERVER) ?>
                </li>
            <?php endif ?>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                <?= t('Not Set') ?>
            </li>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= e('%s Port', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></li>
        <?php if (LDAP_PORT != 389): ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>"><?= LDAP_PORT ?></li>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">389</li>
        <?php endif ?>
    </span>
    <span class="data-wrap">
        <li class="app-info-title"><?= e('Verify %s Security Cerificate', '<abbr title="' . t('Secure Sockets Layer') . '">SSL</abbr>') ?></li>
        <?php if (!LDAP_SSL_VERIFY): ?>
            <li class="app-info-value border-bottom-thick"><?= t('Disabled') ?></li>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                <?= t('Enabled') ?>
            </li>
        <?php endif ?>
    </span>
    <span class="data-wrap mt-0">
        <li class="app-info-title"><?= e('Start with %s', '<abbr title="' . t('Transport Layer Security') . '">TLS</abbr>') ?></li>
        <?php if (LDAP_START_TLS): ?>
            <li class="app-info-value border-bottom-thick"><?= t('Enabled') ?></li>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                <?= t('Disabled') ?>
            </li>
        <?php endif ?>
    </span>
    <span class="data-wrap mt-0">
        <li class="app-info-title"><?= t('Username Case') ?></li>
        <?php if (LDAP_USERNAME_CASE_SENSITIVE): ?>
            <li class="app-info-value border-bottom-thick"><?= t('Preserve Case') ?></li>
        <?php else: ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                <?= t('Lowercase') ?>
            </li>
        <?php endif ?>
    </span>
    <span class="data-wrap mt-0">
        <li class="app-info-title"><?= t('Bind Type') ?></li>
        <?php if (LDAP_BIND_TYPE == 'user'): ?>
            <li class="app-info-value border-bottom-thick"><?= t('User') ?></li>
        <?php elseif (LDAP_BIND_TYPE == 'proxy'): ?>
            <li class="app-info-value border-bottom-thick"><?= t('Proxy') ?></li>
        <?php elseif (LDAP_BIND_TYPE == 'anonymous'): ?>
            <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>"><?= t('Anonymous') ?></li>
        <?php endif ?>
    </span>
    <span class="data-wrap mt-0">
        <li class="app-info-title"><?= t('Username for Proxy & User Modes') ?></li>
        <?php if (LDAP_USERNAME == null): ?>
            <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                <?= t('Not Set') ?>
            </li>
        <?php else: ?>
            <li class="mail-info-value border-bottom-thick privacy"><?= LDAP_USERNAME ?></li>
        <?php endif ?>
    </span>
    <fieldset class="ldap-users">
        <legend><?= e('%s Users', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></legend>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Distinguished Name') ?></li>
            <?php if (LDAP_USER_BASE_DN != ''): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_BASE_DN ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('User Filter') ?></li>
            <?php if (LDAP_USER_FILTER != ''): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_FILTER ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Attribute for Username') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_USERNAME != 'uid'): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_USERNAME ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">uid</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Attribute for Full Name') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_FULLNAME != 'cn'): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_FULLNAME ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">cn</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Attribute for User Email') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_EMAIL != 'mail'): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_EMAIL ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">mail</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Attribute for Groups') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_GROUPS != 'memberof'): ?>
                <li class="mail-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_GROUPS ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">memberof</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Attribute for User Avatar Image') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_PHOTO == 'thumbnailPhoto' || LDAP_USER_ATTRIBUTE_PHOTO == 'jpegPhoto'): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_PHOTO ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('User Language Sync') ?></li>
            <?php if (LDAP_USER_ATTRIBUTE_LANGUAGE != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_USER_ATTRIBUTE_LANGUAGE ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Disabled') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Automatic User Creation') ?></li>
            <?php if (LDAP_USER_CREATION == false): ?>
                <li class="app-info-value border-bottom-thick"><?= t('Disabled') ?></li>
                <span class="p-note ldap-note"><i><?= t('Local user profiles must exist for matching users') ?></i></span>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>"><?= t('Enabled') ?></li>
                <span class="p-note ldap-note"><i><?= t('Local user profiles will be created') ?></i></span>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Default User Role') ?></li>
            <?php if (LDAP_USER_DEFAULT_ROLE_MANAGER == true): ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Manager') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('User') ?>
                </li>
            <?php endif ?>
        </span>
    </fieldset>
    <fieldset class="ldap-groups">
        <legend><?= e('%s Groups', '<abbr title="' . t('Lightweight Directory Access Protocol') . '">LDAP</abbr>') ?></legend>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Administrator Distinguished Name') ?></li>
            <?php if (LDAP_GROUP_ADMIN_DN != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_ADMIN_DN ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Manager Distinguished Name') ?></li>
            <?php if (LDAP_GROUP_MANAGER_DN != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_MANAGER_DN ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Group Provider') ?></li>
            <?php if (LDAP_GROUP_PROVIDER): ?>
                <li class="app-info-value border-bottom-thick"><?= t('Enabled') ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Disabled') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Base Distinguished Name') ?></li>
            <?php if (LDAP_GROUP_BASE_DN != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_BASE_DN ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Group Filter') ?></li>
            <?php if (LDAP_GROUP_FILTER != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_FILTER ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Group User Filter') ?></li>
            <?php if (LDAP_GROUP_USER_FILTER != ''): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_USER_FILTER ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick not-set" title="<?= t('This is the default setting') ?>">
                    <?= t('Not Set') ?>
                </li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('User Attribute in Group Filter') ?></li>
            <?php if (LDAP_GROUP_USER_ATTRIBUTE != 'username'): ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Manager') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">username</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Group Name Attribute') ?></li>
            <?php if (LDAP_GROUP_ATTRIBUTE_NAME != 'cn'): ?>
                <li class="app-info-value border-bottom-thick"><?= LDAP_GROUP_ATTRIBUTE_NAME ?></li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">cn</li>
            <?php endif ?>
        </span>
        <span class="data-wrap">
            <li class="app-info-title"><?= t('Group Sync') ?></li>
            <?php if (LDAP_GROUP_SYNC): ?>
                <li class="app-info-value border-bottom-thick">
                    <?= t('Enabled') ?>
                </li>
            <?php else: ?>
                <li class="app-info-value border-bottom-thick" title="<?= t('This is the default setting') ?>">
                    <?= t('Disabled') ?>
                </li>
            <?php endif ?>
        </span>
    </fieldset>
<?php endif ?>
