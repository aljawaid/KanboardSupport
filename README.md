# Kanboard Technical Support

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

Add a support section in the Kanboard Settings interface so that end users can easily gather any information required by their internal technical support departments and for troubleshooting purposes. 


Features
-------------

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
  - Displays useful directory locations and session information
  - Show if debug mode is enabled or not
- **Database Connection**
  - Display basic database information (without password) from the config file
  - Moved SQLite database (upload/download) options from About page
- **Email Connection**
  - Show basic mail server settings
  - BCC field value only displayed for Admins
  - Show SMTP details if set
  - Show Sendmail details if set
  - Show if mail settings are configured or not
- **Server Configuration**
  - Show useful path locations
  - Display operating system, versions and ports
  - IP Lookup button for Admin
  - Make secure ports easier to identify
- **PHP Information**
  - Display general PHP settings based on the Kanboard installation requirements
  - Check if both required and optional PHP extensions are installed
  - Check PHP minimum requirement
  - Display useful file paths for configuration files


Screenshots
----------

**Directory Permissions**

![Directory Permissions](../master/screenshot-permissions.png "Directory Permissions")

**User Configuration Section**  

![User Configuration](../master/screenshot-user.png "User Configuration")

**Application Information Section**

![Application Information](../master/screenshot-app.png "Application Information")

**Database Connection Section**

![Database Connection](../master/screenshot-db.png "Database Connection")

**Email Connection Section**

![Email Connection](../master/screenshot-mail.png "Email Connection")

**Server Configuration Section**

![Server Configuration](../master/screenshot-server.png "Server Configuration")

**PHP Information Section**

![PHP Information](../master/screenshot-php.png "PHP Information")

Usage
-------------

Go to `Settings` &#10562; `Technical Support` 

**_or_**

Direct Link: Go to User Menu (top right) &#10562; `Technical Support`

Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`

#### Other Plugins & Action Plugins
- _No known issues_
#### Core Files & Templates
- `01` Template override
- _No database changes_

Changelog
---------

Read the full [**Changelog**](../master/changelog.md "See changes")
 

Installation
------------

- **Install via [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to_ Kanboard: `Settings` -> `Plugins` -> `Plugin Directory`

**_or_**

- **Install via [Releases](../master/Releases/ "A copy of each release is saved in the folder") folder**
 - A copy of each release is saved in the Releases folder of the repository
 - Simply extract the `.zip` file into the `plugins` directory

**_or_**

- **Install via [GitHub](https://github.com/aljawaid "Find the correct plugin from the list of repositories")**
- Download the `.zip` file and decompress everything under the directory `plugins`
 - The `.zip` folder must not contain any branch names and must be exact case matching the plugin name

_Note: Plugin folder is case-sensitive._

**_or_**
- `git clone` (_or ftp upload_) and extract the `.zip` into this folder: `.\plugins\` (must be exact case)


Translations
------------

- English (UK)
- German
- _Contributors welcome_


Authors & Contributors
----------------------

- [@aljawaid](https://github.com/aljawaid) - Author
- [RainerBielefeld](https://github.com/RainerBielefeld) - Contributor
- _Contributors welcome_

License
-------
- This project is distributed under [The MIT License](../master/LICENSE "Read The MIT license")
