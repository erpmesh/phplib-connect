### phplib-connect

[![Build Status](https://travis-ci.org/erpmesh/phplib-connect.svg)](https://travis-ci.org/erpmesh/phplib-connect)
[![Total Downloads](https://poser.pugx.org/erpmesh/phplib-connect/d/total.svg)](https://packagist.org/packages/erpmesh/phplib-connect)
[![Latest Stable Version](https://poser.pugx.org/erpmesh/phplib-connect/v/stable.svg)](https://packagist.org/packages/erpmesh/phplib-connect)
[![Latest Unstable Version](https://poser.pugx.org/erpmesh/phplib-connect/v/unstable.svg)](https://packagist.org/packages/erpmesh/phplib-connect)
[![License](https://poser.pugx.org/erpmesh/phplib-connect/license.svg)](https://packagist.org/packages/erpmesh/phplib-connect)


PHP Library that integrated with ERPMesh for the synchronization between other ERP software to php base ERP software

## Installation

Install the latest version with

```bash
$ composer require erpmesh/phplib-connect
```

## Basic Usage

```php
<?php

use erpmesh\phplib-connect\AbstractActionSet;

// implement the handle class
class AppHandler extends AbstractApplicationHandler{
    public function CreatePO($docHeader, $docDetailAr){
        //create PO to your application
    }
    public function CreateSO($docHeader, $docDetailAr){
        //create SO to your application
    }
}


// call the handler to process data
$handler = new AppHandler();
$handler->handleRequest()
```

## Documentation

Please see the documents here [erpMesh](http://erpmesh.com)

## About

### Requirements

- erpMesh phplib-connect works with PHP 5.5 or above, and is also tested to work with HHVM.

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/erpmesh/phplib-connect/issues)

### Author

Pitipong Guntawong - <pppstudio.gm@gmail.com> - <https://fb.com/pppstudio><br />

### License

The ErpMesh phplib-connect is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)