# LaravelPresets

## Install

#### Description: 
Scaffolds for easy start new application

Install package:

```bash
composer require tkach/laravel-presets
```

Run command:

```bash
php artisan preset:up all

php artisan preset:up vuex
php artisan preset:up spa
```

## Structures:

#### Vuex:
<pre>
└─ resources
   └─ js
      ├─ api
      |  └─ auth.js
      └─ store
         ├─ modules
         |  └─ auth
         |     ├─ actions.js
         |     ├─ getters.js
         |     ├─ mutation-types.js
         |     ├─ mutations.js
         |     ├─ state.js
         |     └─ index.js
         └─ index.js
</pre>


#### Spa:
<pre>
├─ app
|   └─ Http
|      ├─ Controllers
|      |  ├─ SpaController.js
|      |  └─ ...
|      └─ ...
└─ router
   ├─ web.php
   └─ ...
</pre>
