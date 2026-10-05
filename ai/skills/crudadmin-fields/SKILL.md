---
name: crudadmin-fields
description: "Write the fields() of CrudAdmin admin models: field types, parameters, select options, belongsTo and belongsToMany relations, dates, file and image uploads, validation rules, visibility, groups and tabs, translatable fields, indexes and defaults. Activates when editing the fields() method of an admin model or a field definition string like 'name:Title|type:editor|required'."
---

# CrudAdmin fields

## When to apply

- Adding, changing or removing a field in the `fields()` method of an admin model.
- Choosing a field type, a relation, an upload field or a validation rule.
- Arranging fields into groups and tabs, hiding them or making them conditional.
- Rendering a field with a custom Vue component.

## Rules

- A field key is the database column. The value is a string of parameters separated by `|`, or an array.
- Field parameters and Laravel validation rules are mixed in one definition: `'name:Name|required|max:90'`.
- Relations are fields: `belongsTo:table,column` and `belongsToMany:table,column`. Do not add relation methods.
- After every change of fields run `php artisan admin:migrate`.

Read the reference page of the topic before writing a parameter. The pages are the official documentation of the installed CrudAdmin version.
