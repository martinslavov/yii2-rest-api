# REST API Extension for Yii2 
==============================

REST API

## Demo
-------

You can test REST API at the following address [gallery.linux-sys-adm.com](gallery.linux-sys-adm.com). You can read, write data вith the following commands:

- Get all data about Employee
http://gallery.linux-sys-adm.com/api/employee/employee-list

- Search Employee by company name
http://gallery.linux-sys-adm.com/api/employee/employee-company?company=Linux-sys-adm%20LTD


For 'Search Employee by name' and 'Make records' and more tests you have to use getResponseRESTAPI.php


## Description
--------------

This is REST API for Yii 2 Advanced Application Template. The template includes two tiers: front end, back end, each of which is a separate Yii application. This REST API 

## Setup
--------

First put modules folder into frontend folder. Then config an component like this in /frontend/config/main.php:

```php
return [
   	...
    'modules' => [
         'api' => [
            'class' => 'frontend\modules\api\Api',
        ],
    ],
    ...
```

## Authors
----------

* **[Martin Slavov](https://www.linkedin.com/in/slavovmartin)** - *REST API Extension for Yii2 * - 


## License
----------

This project is licensed under the MIT License - see the [LICENSE.md](https://opensource.org/licenses/MIT) file for details
