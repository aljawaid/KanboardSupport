# Changelog

## v4.5.1

_(most recent changes are listed on top):_
- FIX: Detect secure read-only application and plugin directories correctly
- FIX: Mark the disabled plugin installer as the recommended production setting
- FIX: Require Mailmagik PHP extensions only when the Mailmagik plugin is installed


## v4.5

_(most recent changes are listed on top):_
- FIX: Update Translations - closes #28
- FIX: Update Plugin Description - #28
- NEW: Display/Download/Delete Debug Log File - displays last 50 entries - download in raw or `zip` format - delete log - #28
- FIX: File Size Precision - #28
- NEW: Show Debug Log File Size - #28
- FIX: Config Notice Alignment - #28
- NEW: Display Last 50 Entries From Debug Log - #28
- NEW: Move Debug Settings to 'Logs & Sessions' Section - #28


## v4.0

_(most recent changes are listed on top):_
- FIX: LDAP Translations - closes #19
- FIX: Mention Excluded Passwords for Clarity
- FIX: Abbreviations Are Not Consistent - #26
- FIX: Translation - #19
- FIX: Translation - #19
- FIX: Update Plugin Description - include new features
- NEW: Different Colours for Tiles - match php colour for required extensions - light grey for optional
- FIX: Optional Tiles Hover
- FIX: Keep Required Extensions Together in Order
- FIX: Database Translation String - was unnecessarily too long for the tile
- NEW: Make PHP Extension Tiles Neater - styling consistency - use PHP logo - restyle extension names
- FIX: Optional Tile Hover for Installed Extension
- FIX: Style Optional Tile Hover for Installed Extension
- NEW: Show Required PHP Module on Hover for `zip` - detects as optional, mentions config files on hover - closes #25
- NEW: Disable Download if `zip` Extension Not Installed - #25
- NEW: Download Config Files Locally - download `.zip` archive file containing both config files named according to the current Kanboard version and date - requires PHP `zip` extension to be installed - #25
- FIX: Migrate Code - `app-info.php` Translations - #24
- FIX: Missing Translations
- FIX: Add Missing Variables - closes #24
- FIX: Migrate Code - `php-info.php` - #24
- FIX: Migrate Code - `server-config.php` - #24
- FIX: Migrate Code - `email-connection.php` - #24
- FIX: Migrate Code - `db-connection.php` - #24
- FIX: Migrate Code - `app-info.php` - #24
- FIX: Migrate Code - `ldap-section.php` - #24
- FIX: Migrate Code - `app-sections` - #24
- FIX: Migrate Code - `user-config.php` - #24
- NEW: Enhanced Privacy for Regular Users - mask mail server - #23
- NEW: Enhanced Privacy for Regular Users - mask directory paths - #23
- NEW: Enhanced Privacy for Regular Users - mask IP addresses - #23
- NEW: Show LDAP Settings Only When Enabled - hides all 26 settings to save screen space unless LDAP is enabled - #19
- FIX: Abbreviation Translation for SMTP
- NEW: Better User Icon
- NEW: Show Required PHP Modules for Mailmagik Plugin - detects as optional, mentions Mailmagik on hover - closes #22
- FIX: Incorrect Tooltips
- FIX: CSS Duplicate Selectors
- NEW: Add LDAP Authentication Setting - #19
- NEW: Add Abbreviation for cURL
- FIX: Better SSL Server Port Wording
- FIX: Content Margins & Spacing
- FIX: Abbreviation Translations
- FIX: Secondary Text Colour Consistency


## v3.0

_(most recent changes are listed on top):_
- FIX: Better Plugin Description
- NEW: Migrate Icons to SVG Using Helper to Improve Performance - #15
- FIX: Remove CSS Icon Dependency - #15
- NEW: Remember Me Authentication Setting - #19
- NEW: Strict Transport Security HTTP Header Setting - #19
- NEW: X-Frame DENY HTTP Header Setting - #19
- NEW: API Authentication Header Setting - #19
- NEW: Disable Logout Setting - #19
- NEW: Hide Login Form Setting - #19
- NEW: Add Reverse Proxy Settings - #19
- NEW: Specify Applicable Version in Tooltip - #19
- FIX: Add ODBC Data Source Name - only show for relevant KB versions - #19
- FIX: CSS Target Value Fields
- NEW: Fade Not Set and Unavailable Default Values
- FIX: Value Fields Font Size
- FIX: Line Height for Brute Force Protection Text
- FIX: CSS Target Version Value Fields
- NEW: Add HTTP Client Proxy Settings - #19
- FIX: Helper Function Syntax - remove ignore syntax test
- FIX: Browser Names
- FIX: Helper Function Returns - switch from `echo` to `return` for coding standards compliance
- FIX: Cleanup Helper Comments
- NEW: Add LDAP Section - #19
- NEW: Add Proxy Sections - #19
- FIX: Switch Order to Save Screen Space - PHP SAPI
- FIX: Field Spacing on Section Overflow - #19
- FIX: Tooltips - #19
- NEW: Add Account Lockdown Duration Setting - #19
- NEW: Add Account Lockdown Setting - #19
- NEW: Add Captcha Setting - #19
- NEW: Add Brute Force Protection Section explain details about built-in protection - #19
- NEW: Add Excluded Fields During External Authentication - #19
- FIX: Translation Syntax
- FIX: Margins
- NEW: Add TOTP Issuer Name Value - #19
- FIX: Tooltip Value - #19
- NEW: Add Self-Signed SSL Setting - #19
- FIX: Code Syntax
- NEW: Display Warning if Config File Not Found - closes #20
- NEW: Display Raw Config Files for Easy Comparison and Reference - #20
- NEW: Add Group Membership Settings - #19
- FIX: PHP IF Statement - #19
- NEW: Add Enable URL Rewrite (Pretty URLs) Setting - #19
- NEW: Add Escape HTML Inside Markdown Setting - #19
- NEW: Create Proxy Settings Accordion - #19
- NEW: Create Group Memberships Accordion - #19
- NEW: Create Security Configuration Accordion - #19
- NEW: Create General Settings Accordion - #19
- NEW: Add ODBC Data Source Name - #19
- NEW: Better Tooltip for Database Timeout - #19
- NEW: Create Logs & Sessions Accordion - migrate values - #19
- NEW: Create Directory Paths Accordion - migrate values - #19
- NEW: Create Plugins Configuration Accordion - migrate values - #19
- NEW: Simplify Application Information Section - migrate values to groups under accordions - #19
- FIX: Add Icons & Tooltips for Debug Mode
- FIX: Tooltips for Default Settings - #19
- NEW: Add Page Description
- NEW: Add MySQL SSL Connection Details - #19
- NEW: Add Database Timeout Setting - #19
- NEW: Add Database Port - #19
- NEW: Display Database Migrations Setting - #19
- NEW: Display Plugin Setup Information - #19
- NEW: Redesigned Webhook Page - closes #18
- NEW: Add Webhook Information Page - #18
- FIX: Duplicate Page Title - title was already displayed in the header - #18
- FIX: Remove Font Dependencies
- FIX: Migrate Icons for Improved Performance - Resolves #15
- FIX: Privacy Warning Margins & Styling
- FIX: Remove Conflicting Borders
- FIX: Code Syntax
- NEW: Improved Data Privacy Warning - moved section into message box for better visibility
- FIX: Link Hover Colour Consistency
- NEW: Link User Name to User Profile
- NEW: Consistent Plugin Icon - #15
- NEW: Add Spanish Translations - #16
- NEW: Add French Translations - #16
- FIX: Update `de_DE` Translations - #16
- FIX: Update `en_GB` Translations - #16
- Fix: Translation Starter Template - #16
- NEW: Updated Translation Starter Template - resolves #16
- FIX: Webhook Translations - #16
- FIX: Untranslate Software Terms - #16
- FIX: Update Starter Translation Template - #16
- NEW: Add HTML Icon to External Links
- FIX: Missing Translation String
- FIX: Remove Duplicate Title
- FIX: Page Title Syntax - #17
- FIX: Page Title - removed duplicate word on page - #17
- FIX: Data Alignments
- FIX: Table Borders
- NEW: Rename Plugin Interface - closes #17
- FIX: Page Code Structure
- FIX: Missing Closing HTML Tags
- FIX: Update Plugin Description - #17
- FIX: Update Translations - #17
- FIX: Rename Page - #17
- FIX: Rename Page Title Dropdown Menu - #17
- FIX: Rename Page Title URL Sidebar - #17
- FIX: Rename Page Title URL Route - #17
- FIX: Rename Page Title - #17


## v2.10

_(most recent changes are listed on top):_
- FIX: User Function Name
- FIX: Message Alerts Bottom Border

## v2.9

_(most recent changes are listed on top):_
- FIX: Padding for Background
- FIX: Link Style Consistency
- FIX: Button Transitions
- FIX: Style Updates Link


## v2.8

_(most recent changes are listed on top):_
- FIX: Code Syntax - `kanboard-support.css`
- FIX: Code Syntax - `support.php`
- FIX: Code Syntax - `messages.css`
- FIX: Code Syntax - `kanboard-support.css`
- FIX: Code Syntax - `SupportHelper.php` - add ignore rule
- FIX: Code Syntax - `SupportHelper.php`
- FIX: Code Syntax - `TechnicalSupportController.php`
- NEW: Add Code Scanning Badges to README.md
- FIX: Syntax & Line Endings
- FIX: README Navigation Links for GitHub
- FIX: Markdown Syntax
- FIX: Code Syntax
- NEW: Add Footer Badges to README.md
- NEW: Add Section Navigation Links to README.md
- NEW: Add Badges to README.md
- NEW: Add README Page Navigation Links
- FIX: Content Flow for README.md
- Create INSTALL.md
- FIX: CSS Syntax - thanks @cptsanifair
- FIX: Message Box Alignment


## v2.7

_(most recent changes are listed on top):_
- FIX: User Dropdown CSS Target
- FIX: Debug Mode Not Showing Correct Value
- FIX: Privacy Button Alignment
- FIX: Icon Spacing
- FIX: Sidebar Menu Indicator
- Prepare compatibility for ContentCleaner


## v2.6

_(most recent changes are listed on top):_
- FIX: Unix Line Endings
- FIX: Remove About Page Override- add ApplicationBranding compatibility - fixes #5
- FIX: CSS Selector Too Restrictive
- FIX: No unit for zero needed
- FIX: Do not use empty rulesets
- FIX: Remove CSS Global Selectors
- FIX: Trying to access array offset on value of type `int` - fixes #6
- FIX: CSS Transition
- FIX: CSS Variable
- Fix CSS Jumping Side Menu


## v2.5

_(most recent changes are listed on top):_
- 5b45488 NEW: Add User Warning for Sharing Info & Hide Data
- Add button to hide sensitive data
- d707764 Change Wording `Technical Support` > `Technical Information`
- 639f12f Change Menu Icon CSS Hack
- 6cc9ea6 NEW: Add German Translations- thanks @RainerBielefeld
- 6ab267a FIX:  Illegal string offset #2 - Remove User Status Field


## v2.0

_(most recent changes are listed on top):_
- Handle Cache Directory Permission Check Differently
- Add More Directory Permissions Check- Based on installation docs
- Add Directory Permissions to README
- NEW: Add Directory Permissions Check
- Add New Helper Functions for Directory Permissions Checks
- Styling improvements
- Updated translations for `en_GB`


## v1.5

_(most recent changes are listed on top):_
- NEW: Add Server Configuration Section
- NEW: Add Abbreviation Hints for Technical Jargon
- NEW: Add IP Lookup button for Admin
- Add Server Configuration Section to README
- NEW: Show Debug Mode
- FIX: Plugin Name should match Namespace
- FIX: Styling - Add `data-wrap` CSS class to PHP Information
- FIX: Styling - Add `data-wrap` CSS class to Application Information
- FIX: Styling - Add `data-wrap` CSS class to Database Connection
- NEW: Add Email Connection Section
- Add Email Connection Section to README
- Prepare last two sections


## v1.0

_(most recent changes are listed on top):_
- Initial release
- Added `en_GB` translations
- NEW: Add Database Connection Section - Display basic database information (without password) from the config file
- Moved SQLite database (upload/download) options from About page
- UPDATE: Application Information Section - Add directories, logfile location, session values
- NEW: Add PHP Information Section
- NEW: Add Application Information Section
- Updated README with Screenshot and Info
- NEW: Use More Meaningful HTML Arrow in Page Title- Use `&#10562;` instead of the usual `&gt;`
- NEW: Add User Configuration Section
- Register and Add Helper for Browser Detection
- FIX: Extra Page Title
- Update Asset files
- Set Template Override
- Add Page in Settings
- Add link in sidebar
- Update plugin file for extra page and sidebar hook

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
