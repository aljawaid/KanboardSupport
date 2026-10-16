# Plugin Installation

- **Install via the [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to:_
    - Kanboard: `Plugins` &#10562; `Plugin Directory`
  - _or with [PluginManager](https://github.com/aljawaid/PluginManager "A Kanboard plugin") installed:_
    - Kanboard: `Settings` &#10562; `Plugins` &#10562; `Plugin Directory`
- **Install a historical version from the [Releases](../master/Releases/ "Historical release archives") folder**
  - The `/Releases` folder contains unchanged archives of earlier versions for reference and rollback
  - Use an archive only when you intentionally need that exact older version; use the latest published release for normal installations
  - Extract the selected `.zip` file into the `/plugins` directory
- **Install via [GitHub](https://github.com/ "Find the correct plugin from the list of repositories")**
  - Download the `.zip` file and decompress everything under the directory `/plugins`
  - The folder inside the `.zip` must not contain any branch names and must be exact case (matching the plugin name)

_Note: The `/plugins` folder is case-sensitive._

- **Install using Git CLI**
  - `git clone` (_or ftp upload_) and extract the `.zip` file into this folder: `.\plugins\` (must be exact case)

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
