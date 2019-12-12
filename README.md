Dekalee Enom
============

[![Latest Stable Version](https://poser.pugx.org/dekalee/enom-bundle/v/stable)](https://packagist.org/packages/dekalee/enom-bundle)
[![Total Downloads](https://poser.pugx.org/dekalee/enom-bundle/downloads)](https://packagist.org/packages/dekalee/enom-bundle)
[![License](https://poser.pugx.org/dekalee/enom-bundle/license)](https://packagist.org/packages/dekalee/enom-bundle)

This bundle will wrap the [enom](https://github.com/dekalee/enom) library.

Installation
------------

Use composer to install this bundle :

```
    composer require dekalee/enom-bundle
```

Activate it in the `AppKernel.php` file:

```php
    new Dekalee\EnomBundle\EnomBundle(),
```

Configuration
-------------

In your `config.yml` file, add your configuration:

```yaml
    swarrot:
        provider: pub_sub
        default_connection: pub_sub
        connections:
            pub_sub:
                host: 'noneRequired'
```

Usage
-----

You can directly use the query service as stated in the library documentation as the services are declared in the
container.
