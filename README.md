<h1 name="user-content-readme-top">KanboardSupport</h1>
<p align="center">
    <a href="https://github.com/aljawaid/KanboardSupport/releases">
        <img src="https://img.shields.io/github/v/release/aljawaid/KanboardSupport?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/releases">
        <img src="https://img.shields.io/github/downloads/aljawaid/KanboardSupport/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/releases">
        <img src="https://img.shields.io/github/directory-file-count/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/releases">
        <img src="https://img.shields.io/github/repo-size/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/releases">
        <img src="https://img.shields.io/github/languages/code-size/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
    </a>
</p>
<p align="center">
    <a href="https://github.com/aljawaid/KanboardSupport/discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/KanboardSupport?style=for-the-badge&color=blue" alt="GitHub Discussions" title="Read Discussions">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/compare">
        <img src="https://img.shields.io/github/commits-since/aljawaid/KanboardSupport/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/compare">
        <img src="https://img.shields.io/github/commit-activity/m/aljawaid/KanboardSupport?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    </a>
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software">
        <img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge&labelColor=000000" alt="Kanboard">
    </a>
</p>

Display the environment and configuration settings of your Kanboard instance all from one dedicated page. View and compare all options from the config file directly from the interface. Users will benefit from identifying problems caused by missing extensions and server misconfigurations without needing backend access to the server.

Made for both regular users and administrators, this privacy and user friendly plugin provides a range of features including integrated webhook documentation and downloading backup copies of the config file.

Works smoothly with [PluginManager](https://github.com/aljawaid/PluginManager) and [ContentCleaner](https://github.com/aljawaid/ContentCleaner).

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Features

- Hide sensitive data before sharing technical information
  - A single privacy button hides all sensitive information
  - Enhanced privacy for regular users displaying selective information for sensitive values
- Troubleshoot plugins with [PluginManager](https://github.com/aljawaid/PluginManager)
- Shows the required PHP modules for [Mailmagik](https://github.com/creecros/Mailmagik)
- **Display and Backup Config Files**
  - Display raw versions of the current and default config files for easy comparison
  - Easily download a `.zip` archive file containing both config files named according to the current Kanboard version and date
  - _Requires PHP `zip` extension to be installed_
- **Display and Backup Debug Log File**
  - Display up to the last 50 entries from the debug log file (regardless of whether the setting is enabled)
  - Download the log file in a compressed `zip` file for archiving
  - Download the log file in raw format
  - Delete the log file (automatically recreates the log)
  - Display the file size
- **Webhooks Information**
  - New improved webhooks page
  - Display alert in webhooks page to avoid potential token issues
  - Comprehensive documentation explaining how to work with webhooks
- **Directory Permissions**
  - Check if directories are writeable or not
  - Display folder owner to Admins
  - Display detected folder permissions to Admins
  - Display permissions also in Linux format to Admins
- **User Configuration**
  - Displays basic settings about the logged in user (including user ID, IP address and browser details) which may be useful to support professionals
  - IP Lookup button for Admin
- **Application Information**
  - Displays Kanboard name, version and (if admin user) direct link to GitHub releases for Kanboard
  - Display all values from the `config.php` file
- **Database Connection**
  - Display database information (without password) from the config file
  - Display advanced database SSL connection information
  - Relocated SQLite database (upload/download) options from the About page
- **Email Connection**
  - Show basic mail server settings
  - BCC field value only displayed for Admins
  - Show SMTP details
  - Show Sendmail details
- **Server Configuration**
  - Show useful path locations
  - Display operating system, versions and ports
  - IP Lookup button for Admin
  - **Apache Configuration**
    - Display installed Apache modules
    - HIghlight relevant module for URL rewriting
  - **Hypertext Access File**
    - Display the `.htaccess` file to admin users
- **PHP Information**
  - Display general PHP settings based on the Kanboard installation requirements
  - Check if both required and optional PHP extensions are installed
  - Check PHP minimum requirement
  - Display useful file paths for configuration files

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Screenshots

**Directory Permissions**

![Directory Permissions](../master/screenshot-permissions.png "Directory Permissions")

**User Configuration Section**  

![User Configuration](../master/screenshot-user.png "User Configuration")

**Application Information Section**

![Application Information](../master/screenshot-app-v4.png "Application Information")

![Application Information](../master/screenshot-app.png "Application Information")

**Debug Log File**

![Logs & Sessions](../master/screenshot-logs.png "Logs & Sessions")

**Database Connection Section**

![Database Connection](../master/screenshot-db.png "Database Connection")

**Email Connection Section**

![Email Connection](../master/screenshot-mail.png "Email Connection")

**Server Configuration Section**

![Server Configuration](../master/screenshot-server.png "Server Configuration")

**PHP Section**

![PHP Information](../master/screenshot-php.png "PHP Information")

**Webhooks Section**

![Webhooks](../master/screenshot-webhooks.png "Webhooks Information")

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Usage

Go to `Settings` &#10562; `Configuration`

**_or_**

Go to User Menu (top right) &#10562; `Configuration`

**_or_**

Go to `Settings` &#10562; `Webhooks`

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Installation & Compatibility

<p align="left">
    <a href="https://github.com/aljawaid/KanboardSupport/actions/workflows/linter.yml">
        <img src="https://github.com/aljawaid/KanboardSupport/actions/workflows/linter.yml/badge.svg?branch=master&event=push" alt="Code Scanning" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/actions/workflows/php-compatibility.yaml">
        <img src="https://github.com/aljawaid/KanboardSupport/actions/workflows/php-compatibility.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
</p>

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- **Other Plugins & Action Plugins**
  - _No known issues_
  - Compatible with [PluginManager](https://github.com/aljawaid/PluginManager), [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding), [ContentCleaner](https://github.com/aljawaid/ContentCleaner), [MailMagik](https://github.com/creecros/Mailmagik)
- **Core Files & Templates**
  - `01` Template override
  - _No database changes_

</details>
<details>
    <summary><strong>Translations</strong></summary>

- English (UK), French, German, Spanish
- _Starter template available_

</details>

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- [RainerBielefeld](https://github.com/RainerBielefeld) - Contributor
- _Contributors welcome_

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

---

<p align="center">
    <a href="https://github.com/aljawaid/KanboardSupport/stargazers" title="View Stargazers">
        <img src="https://img.shields.io/github/stars/aljawaid/KanboardSupport?logo=github&style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/forks" title="See Forks">
        <img src="https://img.shields.io/github/forks/aljawaid/KanboardSupport?logo=github&style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/blob/master/LICENSE" title="Read License">
        <img src="https://img.shields.io/github/license/aljawaid/KanboardSupport?style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/issues" title="Open Issues">
        <img src="https://img.shields.io/github/issues-raw/aljawaid/KanboardSupport?style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/issues?q=is%3Aissue+is%3Aclosed" title="Closed Issues">
        <img src="https://img.shields.io/github/issues-closed/aljawaid/KanboardSupport?style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/discussions" title="Read Discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/KanboardSupport?style=flat-square" alt="KanboardSupport">
    </a>
    <a href="https://github.com/aljawaid/KanboardSupport/compare/" title="Latest Commits">
        <img alt="GitHub commits since latest release (by date)" src="https://img.shields.io/github/commits-since/aljawaid/KanboardSupport/latest?style=flat-square">
    </a>
</p>
<a name="user-content-readme-bottom"></a>
<p align="right">[<a href="#user-content-readme-top">&#8593; Top</a>]</p>
