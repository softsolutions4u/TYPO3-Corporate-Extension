# Corporate Template
One-page responsive TYPO3 template for small businesses, corporates and startups.


# Installation Guide (Composer mode)

> ## ⚠️ Fresh installations only
>
> When the extension is set up, TYPO3 imports the demo data from `ext_tables_static+adt.sql`
> and **empties these tables first**:
> `pages`, `tt_content`, `sys_file`, `sys_file_metadata`, `sys_file_reference`, `sys_template`.
>
> - **Never install this extension into a site that already has content.**
> - This happens every time `vendor/bin/typo3 extension:setup` runs. Many deployment
>   scripts run it automatically after `composer install`.
> - TYPO3 re-imports the file whenever its content changes. Do not edit or delete
>   `ext_tables_static+adt.sql` after you start working on the site.

## 1. Overview

Corporate Template is a custom TYPO3 frontend template extension.

**Extension details**

| Property | Value |
|---|---|
| Extension Name | Corporate Template |
| Extension Key | `corporate_template` |
| Composer Package | `corporate_template/corporate_template` |
| Extension Version | 3.0.0 |
| TYPO3 Compatibility | TYPO3 13.4 LTS and 14.3 LTS (all patch releases) |
| PHP | 8.2 – 8.5 |
| Installation Method | Composer (this guide) |

## 2. Prerequisites

Before installing the extension, ensure that you have:

- A **fresh** TYPO3 13.4 LTS or 14.3 LTS Composer-based installation (no existing content).
- PHP 8.2 – 8.5.
- Composer installed.
- Shell access to the project (for `vendor/bin/typo3`).
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
├── ext_tables_static+adt.sql
└── ext_tables.sql
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

Run:

```bash
composer config repositories.local path 'packages/*'
```

Or open the main project `composer.json` and add the following entry under `repositories`:

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

| Extension | Composer Package | TYPO3 13.4 | TYPO3 14.3 |
|---|---|---|---|
| Powermail (contact form) | `in2code/powermail` | ^13.3 | no release yet |
| Go Maps (map) | `clickstorm/go-maps-ext` | ^8.1 | ^8.1 |
| CS SEO (SEO fields) | `clickstorm/cs-seo` | ^9 | ^10 |

These integrations are optional. Without them, the template still works, and their content
elements simply render nothing.

**Install them before running the setup in section 7.** Then the demo contact form
and map records are imported, and their site sets are added automatically.

To install Powermail (TYPO3 13.4 only):

```bash
composer require in2code/powermail:^13.3
```

To install Go Maps:

```bash
composer require clickstorm/go-maps-ext:^8.1
```

To install CS SEO:

```bash
# TYPO3 13.4
composer require clickstorm/cs-seo:^9

# TYPO3 14.3
composer require clickstorm/cs-seo:^10
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

## 7. Set Up Database and Demo Content

Before applying database changes, create a database backup.

Example:

```bash
mariadb-dump -u USERNAME -p DATABASE_NAME > database_backup.sql
```

Then run the setup and flush the caches:

```bash
vendor/bin/typo3 extension:setup
vendor/bin/typo3 cache:flush
```

The setup:

- creates the database tables and fields of the extension,
- imports the demo pages and content (English + German),
- copies the demo images to `fileadmin/corporate_template/`,
- writes the site configuration to `config/sites/corporate-template/config.yaml`
  and adds the site set `corporate-template/site`. If the TYPO3 installer already created
  a site for root page 1, that site is replaced. Its `base` (your domain) is kept, and
  its placeholder `setup.typoscript` is renamed to `setup.typoscript.bak`,
- if Powermail / Go Maps are installed: imports the demo contact form and map records
  and adds their site sets.

**Optional check in the backend:** open **Admin Tools → Maintenance → Analyze Database
Structure** and confirm that no changes are left.

<img width="1920" height="869" alt="Admin Tools – Maintenance – Analyze Database Structure" src="https://github.com/user-attachments/assets/0d707e1e-f3b3-4558-a016-96ff7cb81264" />

> **Note:** *Analyze Database Structure* only creates tables and fields. It does **not**
> import the demo content or write the site configuration. Use `extension:setup` for that.

## 8. Configure Corporate Template TypoScript

### Recommended: site set (already done by the setup)

1. Open **Site Management → Sites**.
2. Edit the site of the root page.
   
   <img width="1920" height="869" alt="image" src="https://github.com/user-attachments/assets/34fa9ad6-163f-4033-86fe-18256ea3327b" />

4. Check that **Sets** includes `Corporate Template`.

   <img width="1920" height="869" alt="image" src="https://github.com/user-attachments/assets/a06aaf3d-694b-42ab-aa53-17d18d2634ac" />


The site set provides TypoScript and page TSconfig (backend layouts, RTE preset).
It depends on `typo3/fluid-styled-content`, which is loaded automatically.

### Alternative: `sys_template` based sites

Use this only if your site does **not** use the site set.

1. Open **Site Management → TypoScript**.
2. Select the website's root page.
3. Edit the TypoScript template record.
4. On the **Advanced Options** tab, find **Include TypoScript sets** (static templates).
5. Add **Corporate Template (corporate_template)** and **Fluid Styled Content**.
6. Save the template record.
7. Open the root page properties → **Resources** tab → **Page TSconfig** and include
   **Corporate Template** (backend layouts and RTE preset).
8. Clear TYPO3 caches.

> **Do not combine both.** If the site set `Site Management → Sites → Edit → Languages → add the language (e.g. German, base /de/, navigation title DE).` is active, do not also
> include the static TypoScript. Otherwise the TypoScript is loaded twice.

### Constants

| Constant | Default | Meaning |
|---|---|---|
| `plugin.tx_corporatetemplate.settings.homePageUid` | `2` | Page that holds logo, footer and map |

Change it if your home page is not page `2`. Constants are defined in
`Configuration/TypoScript/Main/constants.typoscript`, and the template path overrides are there too.

### Google Maps API key

If Go Maps is installed, set your own API key in **Site Management → Settings** or with the
constant `plugin.tx_gomapsext.settings.apiKey`.

## 9. Configure the Website

Open **Site Management → Sites** and verify that the site configuration written by the setup is correct.

Check:

- Site identifier (`corporate-template`).
- Base URL (your domain).
- Root page ID.
- Language configuration (English default, German).

### Adding a language

Languages are configured in the site configuration only. No TypoScript changes are needed.

1. **Site Management → Sites → Edit → Languages** → add the language
   (e.g. German, base `/de/`, navigation title `DE`).
   <img width="1920" height="2102" alt="image" src="https://github.com/user-attachments/assets/92b67c91-044c-4c02-89f2-bfafe6e700b0" />

2. Translate the pages and content in the **Page** module.

The language menu shows every language that is available for the current page.

## 10. Frontend Verification

Open your website in a browser.

Verify the following (these sections come from the demo content):

- Corporate Template frontend design loads.
- Header and navigation display correctly.
- Banner slider works.
- Services section displays.
- Team section displays.
- Contact section displays.
- Contact form works when Powermail is installed.
- Map works when Go Maps is installed (API key required).

If the frontend displays an error, inspect the TYPO3 logs (`var/log/`) and verify the
site set or TypoScript configuration.

## 11. Troubleshooting

### Extension not appearing

Run:

```bash
composer show corporate_template/corporate_template
```

Check the Composer path repository and extension folder.

### `Table '...tx_corporatetemplate_bannerimagesbox' doesn't exist`

The tables were not created yet. Run:

```bash
vendor/bin/typo3 extension:setup
vendor/bin/typo3 cache:flush
```

Or open **Admin Tools → Maintenance → Analyze Database Structure** and apply all suggestions.

### Frontend is blank or unstyled

Check:

- The site includes the set `Site Management → Sites → Edit → Languages → add the language (e.g. German, base /de/, navigation title DE).` (**Site Management → Sites**).
- The static TypoScript is **not** included as well (see section 8).
- The site configuration points to the correct root page and base URL.
- Page layout (backend layout `home` / `normal`).
- TYPO3 error logs.

### Demo sections are missing

The banner, services, skills, clients, team and portfolio sections are demo records.
They are only present if `vendor/bin/typo3 extension:setup` has run (section 7).

### Clear cache

```bash
vendor/bin/typo3 cache:flush
```

## 12. Installation Complete

Corporate Template installation is complete when:

- The extension is active.
- `extension:setup` has run (database schema and demo content are available).
- The site set `corporate-template/site` is active (or the static TypoScript is included, not both).
- Site configuration is correct.
- Frontend pages render successfully.

---

## Authors
Developed and maintained by **[SoftSolutions4U](https://www.softsolutions4u.com/)**:

- Logesh (Developer)
- ManiMaran (QA)

---

## Support

* Bug reports and feature requests: [Open an issue on GitHub](https://github.com/softsolutions4u/TYPO3-Corporate-Extension/issues) to report bugs, suggest improvements, or request features.
* Commercial support and custom TYPO3 development: [Soft Solutions4U](https://www.softsolutions4u.com/) provides professional assistance for businesses using TYPO3, including installation and configuration of the Corporate Template, theme and layout customization, TYPO3 version upgrades, custom extension development, and third-party integrations.
- Contact us: <info@softsolutions4u.com>

The extension is available free of charge under the license specified in
this repository. Commercial support and custom development services are
available separately.
