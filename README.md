# TystrReactJsBundle

A bundle for integrating [React][0] into [Symfony][1]. Provides server-side
rendering via the [v8js PHP extension][2] for isomorphic app.

[0]: https://facebook.github.io/react/index.html
[1]: https://symfony.com
[2]: http://php.net/v8js


# Installation

Install `tystr/react-js-bundle` with composer:

    # composer.phar require tystr/react-js-bundle:dev-master@dev
    
# Configuration

Register the bundle with your application:

```PHP
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tystr\ReactJsBundle\TystrReactJsBundle(),
        // ...
    );
}
```

Configure the paths to your react.js and components javascript files:

```YAML
# app/config.yml

tystr_react_js:
    react_path: path/to/react.js
    components_path: path/to/components.js
```

# Usage

```twig
{{ react_component('MyComponent', 'my-component') }}

```

This will render the react component `MyComponent` on the server-side and place
it inside a div with the id `my-component`.

To pass data to a component, pass a hash as the third argument:

```twig
{{ react_component('MyComponent', 'my-component', {'name': 'Tyler'}) }}
```
This makes `this.props.name` available in `MyComponent`.

To mount all components rendered with the `react_component` function, use the
`react_mount_components` twig function:

```twig
<script>
    {{ react_mount_components() }}
</script>
```

To mount a single react component (as long as it's already rendered with
`react_component`), use the `react_mount_component` function:

```twig
<script>
    {{ react_mount_component('MyComponent') }}
</script>
```
