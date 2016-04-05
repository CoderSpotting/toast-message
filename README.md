Coderspotting toast-message
===========================

A Symfony Bundle to integrate alertify.js (https://alertifyjs.org/) into your project.

Installation
-----------

```
composer require coderspotting\toast-message
```

Configuration
-------------

The bundle comes with an integrated version of Alertify.js. You can include that version by
adding the following snippet to your Twig template. Optionally you can leave this out and include
your own version of Alertify.js.

```twig
{% stylesheets filter='cssrewrite' 'bundles/coderspottingtoastmessage/css/*' %}
<link href="{{ asset_url }}" type="text/css" rel="stylesheet" media="screen" />
{% endstylesheets %}
```

Similarly the snippet below will load the included version of Alertify.js in your Twig template.
Optionally you can replace this with your own version of Alertify.js.

```twig
{% javascripts '@CoderSpottingToastMessageBundle/Resources/public/js/*' %}
<script type="text/javascript" src="{{ asset_url }}"></script>
{% endjavascripts %}
```

Regardless if you included the builtin version or your own version of Alertify.js you have to include
the following in your Twig template, after the inclusion of the Javascript.

```twig
{{ renderToasts() }}
```

Usage
-----

Retrieve the service and add a toast message as shown below. You can add multiple toast messages.
The next rendering of a Twig template will include the toast messages and show them in the browser.

```php
$toastService = $this->container->get('CoderSpotting.ToastMessage');

$toastService->addToast("This is a toast message");
```