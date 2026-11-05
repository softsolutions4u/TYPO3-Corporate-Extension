# Corporate Template – Installation Guide

## 1. Overview

Corporate Template is a custom TYPO3 frontend template extension.

**Extension details**

| Property | Value |
|---|---|
| Extension Name | Corporate Template |
| Extension Key | `corporate_template` |
| Composer Package | `corporate_template/corporate_template` |
| Extension Version | 3.0.0 |
| TYPO3 Compatibility | TYPO3 13.4 / 14.3+ |
| Installation Method | Composer |

## 2. Prerequisites

Before installing the extension, ensure that you have:

- A working TYPO3 Composer-based installation.
- PHP 8.2 or higher.
- Composer installed.
- A compatible TYPO3 version.
- Access to the Corporate Template 3.0.0 ZIP package.

The extension declares these mandatory TYPO3 dependencies:

- TYPO3 CMS Core
- TYPO3 CMS Backend
- TYPO3 CMS Frontend
- TYPO3 CMS Fluid
- TYPO3 CMS Fluid Styled Content
- TYPO3 CMS RTE CKEditor

## 3. Download Corporate Template

1. Obtain the Corporate Template 3.0.0 ZIP package from your extension provider.
2. Download the ZIP file to your local computer.
3. Extract the package.
4. Verify that the extracted folder contains:

```text
corporate_template/
├── Classes/
├── Configuration/
├── Initialisation/
├── Resources/
├── composer.json
├── ext_emconf.php
├── ext_localconf.php
└── ext_tables.php
```

## 4. Install Corporate Template

### Step 1: Navigate to your TYPO3 project

Open your terminal and navigate to the TYPO3 project root:

```bash
cd /path/to/your/typo3-project
```

### Step 2: Create the packages directory

If it does not already exist:

```bash
mkdir -p packages
```

### Step 3: Copy the extension

Copy the extracted `corporate_template` folder into:

```text
packages/corporate_template/
```

The resulting structure should be:

```text
typo3-project/
├── config/
├── packages/
│   └── corporate_template/
│       ├── Classes/
│       ├── Configuration/
│       ├── Initialisation/
│       ├── Resources/
│       └── composer.json
├── public/
├── vendor/
├── composer.json
└── composer.lock
```

### Step 4: Configure the Composer path repository

Open the main project `composer.json`.

Add the following repository configuration under `repositories`:

```json
{
    "type": "path",
    "url": "./packages/*"
}
```

Keep any existing Composer repositories.

### Step 5: Require the extension

Execute:

```bash
composer require corporate_template/corporate_template:@dev
```

Composer will register the local extension and resolve its mandatory dependencies.

## 5. Optional Extensions

The Corporate Template supports additional integrations.

| Extension | Composer Package | Suggested Version |
|---|---|---|
| Powermail | `in2code/powermail` | 13.3.0 |
| Go Maps | `clickstorm/go-maps-ext` | 8.1.0 |
| CS SEO | `clickstorm/cs-seo` | ^9 for TYPO3 13 |

These integrations are optional and are not required for the basic Corporate Template installation.

To install Powermail:

```bash
composer require in2code/powermail:^13.3
```

To install Go Maps:

```bash
composer require clickstorm/go-maps-ext:^8.1
```

To install CS SEO on TYPO3 13:

```bash
composer require clickstorm/cs-seo:^9
```

Check package compatibility before installing optional extensions.

## 6. Verify Extension Installation

Run:

```bash
vendor/bin/typo3 extension:list
```

Confirm that `corporate_template` appears as an active extension.

You can also check:

```bash
composer show corporate_template/corporate_template
```

For a local path repository, Composer may display `dev-main` as the package version. The extension's own version is defined in `ext_emconf.php`.

## 7. Database Configuration

Before applying database changes, create a database backup.

Example:

```bash
mariadb-dump -u USERNAME -p DATABASE_NAME > database_backup.sql
```

Next:

1. Log in to the TYPO3 backend.
2. Open **Admin Tools → Maintenance**.
3. Select **Analyze Database Structure**.
4. Run the database comparison.
5. Review the proposed changes.
6. Apply only the changes required by the installed extensions.

After applying the changes, verify that the database schema is up to date.

**Important:** Do not import demo data unless you explicitly intend to create demo records. Preserve existing pages and content.

## 8. Configure Corporate Template TypoScript

1. Open the TYPO3 backend.
2. Navigate to **Web → Template**.
3. Select the website's root page.
4. Open the TypoScript template record.
5. Select the **Includes** tab.
6. Find **Include static (from extensions)**.
7. Add:

```text
corporate_template (corporate_template)
```

8. Save the template record.
9. Clear TYPO3 caches.

Make sure the required Fluid Styled Content configuration is also included.

## 9. Configure the Website

Verify that your TYPO3 site configuration points to the correct root page.

Check:

- Site identifier.
- Base URL.
- Root page ID.
- Language configuration.

Do not overwrite an existing site configuration unnecessarily.

## 10. Frontend Verification

Open your website in a browser.

Verify the following:

- Corporate Template frontend design loads.
- Header and navigation display correctly.
- Banner slider works.
- Services section displays.
- Skills section displays.
- Clients section displays.
- Team section displays.
- Portfolio section displays.
- Contact section displays.
- Contact form works when Powermail is installed.
- Map works when Go Maps is installed.

If the frontend displays an error, inspect the TYPO3 logs and verify the Fluid template paths and TypoScript configuration.

## 11. Troubleshooting

### Extension not appearing

Run:

```bash
composer show corporate_template/corporate_template
```

Check the Composer path repository and extension folder.

### Database schema errors

Open:

**Admin Tools → Maintenance → Analyze Database Structure**

Review the missing tables and fields.

### Frontend template not rendering

Check:

- TypoScript template inclusion.
- Fluid template paths.
- Template file availability.
- Page layout configuration.
- TYPO3 error logs.

### Clear cache

```bash
vendor/bin/typo3 cache:flush
```

## 12. Installation Complete

Corporate Template installation is complete when:

- The extension is active.
- Required database schema is available.
- TypoScript is included.
- Site configuration is correct.
- Frontend pages render successfully.

---

**End of Installation Guide**
