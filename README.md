# Psr And Log4Php Adapter Component

This component provides adapters for using Psr Logger in Log4Php Environment and vice versa.

The main idea is to easy up usage and/or migration of existing Log4Php application with/into [Psr loggers](https://github.com/php-fig/log).

# Features

* Log4Php Logger Interface
* Log4Php to Psr Logger Bridge
* Psr Logger to Log4PhP Bridge

# Example

## Use a psr-logger in a Log4Php

```php
$adapter = new \Net\Bazzline\Component\PsrAndLog4PhpAdapter\Log4PhpToPsrLoggerAdapter('your name');
$adapter->injectPsrLogger($psrLoggerInstance);
$adapter->debug('my debug log');
```

## Use a Log4Php in a psr-logger

```php
$adapter = new \Net\Bazzline\Component\PsrAndLog4PhpAdapter\PsrToLog4PhpLoggerAdapter($log4PhpInstance);
$adapter->debug('my debug log');
```

# Installation

## [GitHub](https://github.com/stevleibelt/php_component_psr_and_log4php_adapter)

```
mkdir -p $HOME/path/to/my/repositories/php_component_psr_and_log4php_adapter
cd $HOME/path/to/my/repositories/php_component_psr_and_log4php_adapter
git clone https://github.com/stevleibelt/php_component_psr_and_log4php_adapter .
```

## [Composer](https://packagist.org/packages/net_bazzline/component_psr_and_log4php_adapter)

```
require: "net_bazzline/component_psr_and_log4php_adapter": "dev-master"
```

# Notes

* throwable are currently ignored in Log4PhpToPsrLoggerAdapter::log()
* context is currently ignored in PsrToLog4PhpAdapter::log()

# Licence

This software is licenced under [GNU LESSER GENERAL PUBLIC LICENSE](https://www.gnu.org/copyleft/lesser.html).
The full licence text is shipped [within](https://github.com/stevleibelt/php_component_psr_and_log4php_adapter/blob/master/LICENSE) this component package.

# Version History

* upcoming
    * @todo
        * add travis build status
        * add scrutinizer build status
        * implement conversion of throwable into something in Log4PhpToPsrLoggerAdapter::log()
        * implement conversion of context into something in PsrToLog4PhpAdapter
* [2.0.0](https://github.com/stevleibelt/php_component_psr_and_log4php_adapter/tree/2.0.0)
    * added example
    * added version boundary to psr log and log4php
    * covered code with unit tests
    * moved injected logger from protected to private
    * moved to psr-4 autoloading
    * refactored loggers and the way how to inject the logger you want to bridge
    * removed Log4PhpLoggerInterface since this simple complicates stuff
* [1.0.0](https://github.com/stevleibelt/php_component_psr_and_log4php_adapter/tree/1.0.0)
    * Log4Php Logger Interface
    * Log4Php to Psr Logger Bridge
    * Psr Logger to Log4PhP Bridge
