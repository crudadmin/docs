---
name: crudadmin-models
description: "Build and configure CrudAdmin admin models: parameters, permissions, listing, settings, tree and ordering, buttons, layouts, history, rules and events, uploads, migrations, localization, API and validation of requests. Activates when working with classes extending Admin\\Eloquent\\AdminModel, model properties like $settings, $buttons, $belongsToModel, $sortable, $publishable, or php artisan admin:* commands."
---

# CrudAdmin admin models

## When to apply

- Creating or changing an admin model, a class extending `Admin\Eloquent\AdminModel`.
- Changing what the administration shows for a model: permissions, listing, search, filters, exports, settings, the menu.
- Adding buttons, layouts, admin rules, hooks or modules to a model.
- Running or debugging `php artisan admin:migrate` and the other `admin:*` commands.
- Validating a request with the rules of an admin model.

## Workflow

1. Create the model with `php artisan admin:model Name`, never by hand.
2. Define the fields, see the `crudadmin-fields` skill.
3. Set the parameters described in the reference pages below.
4. Run `php artisan admin:migrate`. Never write Laravel migrations for admin model tables.

Read the reference page of the topic before writing a parameter. The pages are the official documentation of the installed CrudAdmin version.
