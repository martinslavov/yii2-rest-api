# REST API Extension for Yii2 

## Description

This is REST API for Yii 2 Advanced Application Template. The template includes two tiers: front end, back end, each of which is a separate Yii application.

Demo
-------

You can test REST API at the following address [gallery.linux-sys-adm.com](gallery.linux-sys-adm.com). You can read, write data вith the following commands:

- Get all data about Employee
[Click Here](http://gallery.linux-sys-adm.com/api/employee/employee-list?csrf=gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA==)

- Search Employee by company name
[Click Here](http://gallery.linux-sys-adm.com/api/employee/employee-company?company=Linux-sys-adm%20LTD&csrf=gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA==)

For 'Search Employee by name' and 'Make records' and more tests you have to use this file getResponse.php.

## Setup

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

* **[Martin Slavov](https://www.linkedin.com/in/slavovmartin)** - *REST API Extension for Yii2 *


## License

This project is licensed under the MIT License - see the [LICENSE.md](https://opensource.org/licenses/MIT) file for details
