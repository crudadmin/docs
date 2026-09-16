# Documentation project instructions

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
| Getting started | `index`, `admin/how-it-works`, `admin/installation`, `admin/configuration`, `admin/license`, `admin/migration-from-v5`, `admin/contact` |
| Admin interface | `admin/model/index`, `admin/model/parameters`, Fields subgroup (`admin/model/fields` overview + `admin/model/fields/*`), `admin/model/actions`, `admin/model/layouts`, `admin/model/relations`, `admin/model/localization` |
| Validation | `admin/validation/index`, `admin/validation/request` |
| Frontend | `admin/frontend/sluggable`, `admin/frontend/files` |

This mirrors the group order of the legacy Docsify sidebar. Validation is new — it did not exist in the legacy docs.

### Tab: Helpers package — `helpers/`

The `crudadmin/helpers` composer package: installation, authentication, OTP, registration, login.

### Tab: Development structure — `development/`

Project structure and conventions shared across our applications, including the bootstrap request.

### Assets

- `images/` — copied 1:1 from the legacy docs, subdirectories preserved (`buttons/`, `database/`, `fields/`, `helpers/`, `model-groups/`, `preview/`, `terminal/`)
- `logo/`, `favicon.svg` — CrudAdmin branding, do not replace with Mintlify defaults

Four images are not referenced by any page:

- `images/languages-mirroring.png` and `images/multiple_columns_languages.png` were unreferenced in the legacy docs too, and are kept for a future page.
- `images/article-image-dd.png` was a dump of the v5 `Admin\Helpers\File` class, outdated for v6.
- `images/memo.png` was the icon of the "Edit on Github" link in the legacy `index.html`. Mintlify provides that link natively, so the image is no longer needed and can be removed.

## Legacy documentation

The legacy Docsify documentation lives on the **`old`** branch of this repository, and locally in `../docsify_old`. The new documentation is on **`dev`**.

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
- Use `<CodeGroup>` when showing the same thing in several variants
- Callouts by severity: `<Note>` supplementary, `<Info>` context, `<Tip>` recommendation, `<Warning>` destructive or migration-requiring
- Legacy Docsify callouts map as follows: `!>` → `<Warning>` or `<Info>`, `?>` → `<Tip>`
- Use `<Columns cols={n}>` for card grids
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
