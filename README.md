# Elema Addons Elementor Plugin

This is a addons plugin to demonstrate how you can write extentions (plugins) to add custom functionality to [Elementor](https://github.com/pojome/elementor/)

Plugin Structure:

```
assets/
  /css
    /style.css
  /js
    /main.js

includes/
  widgets/
    /hello-world.php

index.php
elema-addons.php
```

- `assets` directory - holds plugin JavaScript and CSS assets
  - `/css` directory - Holds plugin CSS Files
  - `/js` directory - Holds plugin Javascript Files
- `includes` directory - Holds widgets,controls,finder and dynamic tags
  - `widgets` directory - Holds Plugin widgets
    - `/hello-world.php` - Hello World demo Widget class
    - `/inline-editing.php` - Inline Editing demo Widget class
- `index.php` - Prevent direct access to directories
- `elema-addons.php` - Main plugin file, used as a loader if plugin minimum requirements are met.

For more documentation please see [Elementor Developers Resource](https://developers.elementor.com/creating-an-extension-for-elementor/).
