# WordPress Plugin - Woda {Plugin Name}

> One liner that explains the plugin

## Installation

You can install the plugin by uploading it in the WordPress Admin or via `composer`.

```bash
composer require woda/wp-{plugin-name}
```

If you installed the plugin via `composer` you will have to initialize it yourself to be able to use it. Add this to your theme's function file

```php
Woda\WordPress\{PluginName}\Init::init($settings);
```

## Configure

```php
add_filter('woda_{plugin_name}_settings', static function($settings) {
    return [];
}, 10, 1);
```
