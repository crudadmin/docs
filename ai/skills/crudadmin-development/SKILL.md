---
name: crudadmin-development
description: "Share data from a Laravel CrudAdmin backend with Nuxt, Ionic and Vue frontends: the bootstrap request (AppRequest sections), autoAjax()->store() responses and the @crudadmin/helpers npm package binding them into Pinia stores. Activates when writing a bootstrap section, a controller response for a frontend, a Pinia store, useAxios()/useResponse() calls, or configuring the @crudadmin/helpers Nuxt layer."
---

# CrudAdmin development structure

## When to apply

- Adding data the frontend needs: a section of the bootstrap request (`AppRequest`), or a controller response.
- Writing a Pinia store filled by the backend, or a frontend request to the API.
- Setting up a new Nuxt, Ionic or Vue frontend, its boot, auth and translations.

## Rules

- Frontends talk to the backend only through `@crudadmin/helpers`: `useAxios()` for every request, `useResponse()` for every response and error.
- Shared data is a section of the bootstrap request. The section and its Pinia store have the same name, in the singular (`event()` → `defineStore('event')`).
- Controllers answer with `autoAjax()`. Data for the stores goes into `->store([...])`: changed sections (`AppRequest::only(['auth'])`) or store actions (`'event/updateEvent' => $event`). Data of one component goes into `->data([...])`.
- `config/autoajax.php` sets `'store' => true`.
- Register every store receiving data with `Response.addStores([useXxxStore])`; do not copy response data into stores by hand.
- In Nuxt extend `@crudadmin/helpers/nuxt` with `crudadmin.bootstrap.enabled`; do not write an own bootstrap fetch, axios setup or auth token handling.

Read the reference page of the topic before writing code.
