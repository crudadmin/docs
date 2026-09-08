# Documentation project instructions

## About this project

- This is the CrudAdmin documentation site, built on [Mintlify](https://mintlify.com)
- Pages are MDX files with YAML frontmatter (`title`, `description`, optional `icon`)
- Configuration lives in `docs.json`
- Every new page must be added to `navigation` in `docs.json`, otherwise it will not be reachable
- The legacy Docsify documentation lives in `../docsify_old` and is being migrated into this project
- Use the Mintlify MCP server, `https://mcp.mintlify.com`, to edit content and settings via MCP
- Use the Mintlify docs MCP server, `https://www.mintlify.com/docs/mcp`, to query information about using Mintlify via MCP

## Structure

The site has three tabs, each backed by its own directory:

| Tab | Directory | Content |
| --- | --- | --- |
| CrudAdmin | `admin/` | Admin models, validation, quickstart |
| Helpers package | `helpers/` | The `crudadmin/helpers` package (installation, authentication) |
| Development structure | `development/` | Shared development conventions across projects |

Shared assets: `images/`, `logo/`.

## Terminology

- **AdminModel** — a CrudAdmin model class, not "entity" or "resource"
- **CrudAdmin** — always one word, capital C and A
- Use "package" for the composer packages (`crudadmin/crudadmin`, `crudadmin/helpers`)

## Style preferences

- Documentation is written in **English**
- Use active voice and second person ("you")
- Keep sentences concise — one idea per sentence
- Use sentence case for headings
- Bold for UI elements: Click **Settings**
- Code formatting for file names, commands, paths, and class/method references
- Always give fenced code blocks a language, and a title where it helps: ```php Article.php
- Use `<ResponseField>` / `<Expandable>` for option and property reference tables
- Use `<CodeGroup>` when showing the same thing in several languages or frameworks

## Mintlify conventions

- LaTeX uses `$inline$` and `$$block$$` math syntax — the old `<Latex>` component is deprecated
- Prefer `<Columns cols={n}>` for card grids
- Run `mint broken-links` before committing to verify internal links resolve

## Content boundaries

- Document the public API of the packages — not internal implementation details that are free to change
- Do not document credentials, license keys, or customer-specific configuration
