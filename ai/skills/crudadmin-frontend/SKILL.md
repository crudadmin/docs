---
name: crudadmin-frontend
description: "Extend the CrudAdmin administration UI with Vue components, model rows, modals, toasts, slots and a custom Vite build, and use admin models on the website: slugs, SEO and uploaded files. Activates when writing .vue components in resources/views/admin/components, using the admin Vue globals, or reading slugs and files of admin models in Blade."
---

# CrudAdmin frontend

## When to apply

- Writing a Vue component for a field, a column, a button or a layout of the administration.
- Using the admin Vue API: model instances, events, stores, modals and toasts.
- Placing components into slots of the administration or building them with Vite.
- Generating slugs and SEO meta tags, or reading uploaded files and resized images on the website.

## Rules

- Create components with `php artisan admin:component Name`, they live in `resources/views/admin/components/{fields,layouts,buttons,columns}`.
- Components are loaded without a build step unless the project uses the Vite scaffold.

Read the reference page of the topic before writing code. The pages are the official documentation of the installed CrudAdmin version.
