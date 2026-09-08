# CrudAdmin documentation

The [CrudAdmin](https://github.com/crudadmin) documentation site, built on [Mintlify](https://mintlify.com).

Content lives in MDX files, navigation and site settings in `docs.json`. Project-specific writing conventions for AI tools are in [`AGENTS.md`](AGENTS.md).

## Structure

| Tab | Directory |
| --- | --- |
| CrudAdmin | `admin/` |
| Helpers package | `helpers/` |
| Development structure | `development/` |

## Branches

This repository holds both generations of the documentation:

- **`dev`** — the Mintlify documentation in this directory, where all work happens
- **`old`** — the legacy Docsify documentation, kept for reference

The legacy content has been fully migrated and translated into English. The mapping from each legacy page to its new location is in [`AGENTS.md`](AGENTS.md).

## Development

Install the [Mintlify CLI](https://www.npmjs.com/package/mint) to preview your changes locally:

```
npm i -g mint
```

Run the following command at the root of the documentation, where `docs.json` is located:

```
mint dev
```

View your local preview at `http://localhost:3000`.

Check that internal links resolve before committing:

```
mint broken-links
```

## AI-assisted writing

Set up your AI coding tool to work with Mintlify:

```bash
npx skills add https://mintlify.com/docs
```

This installs Mintlify's documentation skill for tools like Claude Code, Cursor and Windsurf. The skill includes the component reference, writing standards, and workflow guidance.

## Publishing changes

The Mintlify GitHub app propagates changes from this repo to the deployment. Changes are deployed to production automatically after pushing to `main`.

## Need help?

### Troubleshooting

- If your dev environment isn't running: run `mint update` to ensure you have the most recent version of the CLI.
- If a page loads as a 404: make sure you are running in a folder with a valid `docs.json`, and that the page is listed in `navigation`.

### Resources

- [Mintlify documentation](https://mintlify.com/docs)
- [Mintlify community](https://mintlify.com/community)
