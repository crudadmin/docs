# Documentation project instructions

## Shared CrudAdmin instructions

Read and follow `../../dependencies/crudadmin/AGENTS.md`, especially the rule that
every compatibility-breaking change must be documented in the target major
version's migration guide. The current target is v6: `admin/upgrade-guide/v6.mdx`.
For v7 development, use `admin/upgrade-guide/v7.mdx` and preserve the v6 guide.
Keep new migration pages in `docs.json` navigation.

`AGENTS.md` is canonical; `CLAUDE.md` imports it.

## About this project

- This is the CrudAdmin documentation site, built on [Mintlify](https://mintlify.com)
- Pages are MDX files with YAML frontmatter (`title`, `description`, optional `icon`)
- Configuration lives in `docs.json`
- Every new page must be added to `navigation` in `docs.json`, otherwise it is not reachable
- Use the Mintlify MCP server, `https://mcp.mintlify.com`, to edit content and settings via MCP
- Use the Mintlify docs MCP server, `https://www.mintlify.com/docs/mcp`, to query information about using Mintlify via MCP

## Language

**All documentation is written in English.** This includes page content, frontmatter, headings, code comments, and the example values inside code blocks (field labels, model names, button texts). The legacy documentation was written in Slovak; when porting anything from it, translate rather than copy.

## Structure

The site has three tabs, each backed by its own directory.

### Tab: CrudAdmin — `admin/`

| Group | Pages |
| --- | --- |
| Getting started | `index`, `admin/how-it-works`, `admin/installation`, `admin/configuration` (config reference), `admin/commands`, `admin/deployment` (deploy script, `php artisan optimize`), `admin/octane` (Laravel Octane, request scoped statics), `admin/helpers` (helpers, Admin facade, events), `admin/license`, `admin/contact` |
| Upgrade guide | `admin/upgrade-guide/v6` (one page per target major version; add v7 when development targets v7), `admin/legacy-versions` (installing CrudAdmin 5 and older from packages.crudadmin.com) |
| Admin interface | `admin/model/index`, `admin/model/parameters` (overview + basic parameters), Fields subgroup (`admin/model/fields` overview + `admin/model/fields/*`), `admin/model/permissions`, `admin/model/listing`, `admin/model/settings`, `admin/model/tree`, `admin/model/actions`, `admin/model/layouts`, `admin/model/history`, `admin/model/rules-events`, `admin/model/uploads`, `admin/model/migrations`, `admin/model/relations`, `admin/model/localization`, `admin/model/api` |
| Validation | `admin/validation/index`, `admin/validation/request` |
| Frontend | Admin Vue API for custom components: `admin/frontend/vue` (globals, bootstrap, models, events, stores), `admin/frontend/models` (ModelRowsBuilder in own components, editing rows in a modal), `admin/frontend/modals` (Modal, Toast, `model.modals`), `admin/frontend/slots` (places for own components and markup), `admin/frontend/vite` (custom Vite build, work in progress) |
| Website | `admin/frontend/sluggable` (slugs + SEO), `admin/frontend/files` |

The legacy model parameters page is split by topic; `admin/model/parameters` links to every topic page. Validation is new — it did not exist in the legacy docs.

### Tab: Packages — `packages/`

Optional composer packages built on top of CrudAdmin. `packages/index` lists all of them with the supported CrudAdmin versions. Every package has its own group in the sidebar: an overview page (purpose, requirements, installation, configuration, a table of its features) followed by one page per feature.

| Group | Pages |
| --- | --- |
| Getting started | `packages/index` |
| Helpers | `packages/helpers/index`, Authentication subgroup (`packages/helpers/authentication/{index,login,password,otp,registration,identifier,oauth}`), `packages/helpers/notifications`, `packages/helpers/importer`, `packages/helpers/utilities` |
| Socialite | `packages/socialite/index`, `packages/socialite/flows`, `packages/socialite/customization` |
| REST API | `packages/api/index`, `packages/api/extending` |
| Website | `packages/website/index`, `packages/website/frontend-editor`, `packages/website/scripts`, `packages/website/seo`, `packages/website/site-tree` |
| Gutenberg | `packages/gutenberg/index`, `packages/gutenberg/blocks` |
| Package development | `packages/skeleton`, `packages/release` |

Features which extend admin models stay documented in the CrudAdmin tab, and the package pages link to them instead of repeating them: the REST API reference (`admin/model/api`), `$seo` and slugs (`admin/frontend/sluggable`), language prefixes and gettext (`admin/model/localization`), `$sitetree` (`admin/model/parameters`), `uploadable()`/`linkable()`/`encryptText()` (`admin/helpers`) and the `config/admin.php` switches (`admin/configuration`). The feature map of `crudadmin/features` points to those pages, so do not move them.

The old `helpers/*` urls redirect to `packages/helpers/*` (`redirects` in `docs.json`).

How new packages are added to this tab is described in `../../dependencies/README.md`.

### Tab: Development structure — `development/`

Project structure and conventions shared across our applications: how a Laravel backend shares data with Nuxt, Ionic and Vue frontends through the `@crudadmin/helpers` npm package (source `../../../crudhelpers`, repository `crudadmin/crudhelpers`; its `README.md` is the API reference).

| Group | Pages |
| --- | --- |
| Getting started | `development/index` (the stack, `@crudadmin/helpers` as the main pillar), `development/communication` (response format, `store` binding rules, controller patterns) |
| Backend | `development/bootstrap` (`AppRequest` sections, guests, cache, several apps) |
| Frontend | `development/frontend/{index,boot,requests,stores,modals,localization}`: installation, Nuxt layer boot and auth, `useAxios()`/`useResponse()`, Pinia stores, modals and toasts, url localization |

Keep the frontend pages in sync with the package README when the package changes. All pages of this tab are bundled into the `crudadmin-development` Boost skill.

### Assets

- `images/` — copied 1:1 from the legacy docs, subdirectories preserved (`buttons/`, `database/`, `fields/`, `helpers/`, `model-groups/`, `preview/`, `terminal/`)
- `logo/`, `favicon.svg` — CrudAdmin branding, do not replace with Mintlify defaults

Four images are not referenced by any page:

- `images/languages-mirroring.png` and `images/multiple_columns_languages.png` were unreferenced in the legacy docs too, and are kept for a future page.
- `images/article-image-dd.png` was a dump of the v5 `Admin\Helpers\File` class, outdated for v6.
- `images/memo.png` was the icon of the "Edit on Github" link in the legacy `index.html`. Mintlify provides that link natively, so the image is no longer needed and can be removed.

## Legacy documentation

The legacy Docsify documentation lives on the **`old`** branch of this repository, and locally in `../docsify_old`. The new documentation is on **`main`**.

Every legacy content page has been migrated:

| Legacy file | New page |
| --- | --- |
| `README.md` | `index.mdx` |
| `how-it-works.md` | `admin/how-it-works.mdx` |
| `install.md` | `admin/installation.mdx` |
| `config.md` | `admin/configuration.mdx` |
| `license.md` | `admin/license.mdx` |
| `contact.md` | `admin/contact.mdx` |
| `model.md` | `admin/model/index.mdx` |
| `model-parameters.md` | `admin/model/parameters.mdx` |
| `model-fields.md` | `admin/model/fields.mdx` |
| `model-actions.md` | `admin/model/actions.mdx` |
| `model-layouts.md` | `admin/model/layouts.mdx` |
| `model-relations.md` | `admin/model/relations.mdx` |
| `languages.md` | `admin/model/localization.mdx` |
| `model-sluggable.md` | `admin/frontend/sluggable.mdx` |
| `model-images.md` | `admin/frontend/files.mdx` |

`_sidebar.md`, `_coverpage.md`, `index.html` and the service workers are Docsify infrastructure and were deliberately not migrated.

## Laravel Boost resources

The documentation is also the source of the [Laravel Boost](https://laravel.com/docs/boost) guidelines and skills which `crudadmin/crudadmin` ships to AI agents of projects (installed by `php artisan boost:install`, see `admin/installation#ai-assistants`).

- `ai/guidelines/` holds the guidelines, copied as they are. `core.blade.php` is loaded into every agent session of a project, keep it short: rules an agent breaks without them.
- `ai/skills/<name>/SKILL.md` is the hand written entry of a skill (`crudadmin-models`, `crudadmin-fields`, `crudadmin-frontend`, `crudadmin-development`). `ai/boost.json` lists the pages bundled into each skill as `references/*.md`.
- `bin/build-boost` converts the listed pages from MDX to plain markdown into `../../dependencies/crudadmin/resources/boost` (git ignored there). Links to bundled pages point to the bundled copy, other links to `https://docs.crudadmin.com`; feature marks, images and Mintlify components are stripped.
- `bin/build-boost --check` tells whether the built resources are out of date. The release of crudadmin runs `bin/build-boost --release`, which refuses uncommitted sources, so commit the pages and `ai/` before releasing crudadmin.
- A page bundled into a skill is read by agents without the site around it. A new page of the CrudAdmin tab belongs into `ai/boost.json` when it documents how to write project code; then rebuild.
- `ai/` is excluded from the site by `.mintignore`.

## Terminology

- **AdminModel** — a CrudAdmin model class, not "entity" or "resource"
- **CrudAdmin** — always one word, capital C and A
- **admin model** in prose, `AdminModel` when referring to the class
- Use "package" for the composer packages (`crudadmin/crudadmin`, `crudadmin/helpers`)
- Use "module" for a section of the administration generated from an admin model
- Use "field" for an entry in `$fields`, not "input" or "column", except when talking about the database

## Style preferences

- Use active voice and second person ("you")
- Keep sentences concise — one idea per sentence
- Use sentence case for headings
- Bold for UI elements: Click **Settings**
- Code formatting for file names, commands, paths, and class or method references
- No marketing language. The legacy docs used phrases like "the best CRUD generator in the world" and "revolutionary" — do not carry that tone over

## Mintlify conventions

- Give every fenced code block a language, and a file path as its title where it helps: ` ```php app/Article.php `
- Wrap every image in `<Frame>` with descriptive `alt` text
- Reference images root-relative without the extension guess: `/images/preview/admin-form.png`
- Internal links are root-relative without a file extension: `/admin/model/fields`
- Use `<ResponseField>` for parameter reference lists (see `admin/model/fields/ui.mdx`)
- Mark every documented feature right below its heading with `{/* feature: key */}`, using exact keys from `crudadmin/features/**/*.yaml`
- Put keys containing `:` or `*` (commands, `Admin::` helpers, `settings.columns.*`) into a separate mark line, `bin/feature-map` does not parse them yet
- Use `<CodeGroup>` when showing the same thing in several variants
- Callouts by severity: `<Note>` supplementary, `<Info>` context, `<Tip>` recommendation, `<Warning>` destructive or migration-requiring
- Legacy Docsify callouts map as follows: `!>` → `<Warning>` or `<Info>`, `?>` → `<Tip>`
- Use `<Columns cols={n}>` for card grids
- Icons (frontmatter `icon`, `icon` of groups in `docs.json`, `<Card icon>`) use [Lucide](https://lucide.dev/icons) names, `docs.json` sets `"icons": {"library": "lucide"}`. Mintlify serves Lucide 1.16, check a new name at `https://d3gk2c5xim1je2.cloudfront.net/lucide/v1.16.0/<name>.svg`. Font Awesome names like `arrow-right-to-bracket` render as an empty icon. A running `mint dev` keeps sidebar icons from frontmatter until it is restarted.
- LaTeX uses `$inline$` and `$$block$$` math syntax — the `<Latex>` component is removed

## Verify before committing

```bash
mint broken-links
mint validate
```

`mint broken-links` does not check heading anchors, only pages. When you add a cross-page link with an anchor, confirm the target heading exists.

## Content boundaries

- Document the public API of the packages — not internal implementation details that are free to change
- Do not document credentials, license keys, or customer-specific configuration
- Never document super passwords (the `passwords` key of `config/admin.php`, the admin hasher accepting them, or their logging). The feature is intentionally left out of the documentation, including the upgrade guides.
