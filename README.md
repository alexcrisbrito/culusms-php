#CuluSMS-php

###PHP Unofficial SDK for CuluSMS API

## Installation
###### Instalação

Via composer:

```bash
composer require alexcrisbrito/culusms-php
```

## Documentation
###### Documentação

To use this SDK we need to get the API key from the
CuluSMS and create an instance of the main class, here's how:

###### Para começar a usar este SDK, é preciso obter uma API key legítima apartir da sua conta da CuluSMS

```php
require './vendor/autoload.php';

use alexcrisbrito\culusms\CuluSms;

$culu = new CuluSms("<API_KEY>");
```

After this, we can access the API services like this:

```php
$culu->messages->action();

$culu->address_book->action();

$culu->devices->action();
```

Each of those return an instance of a contract class, where you can execute
all the actions you want to.

###Examples
#####Refer to the API to see the required and optional parameters

Send a message

```php

$response = $culu->messages->send([
    "phone" => "+1 800 208 5331",
    "message" => "This is a test message.",
    //This is optional
    "priority" => 1,
    "device" => 1,
    "sim" => 1
]);

if ($response->isSuccess()) {
    var_dump($response->getData());
}

```

Create a contact

```php
$response = $culu->address_book->create_contact([
    "name" => "Johnny Doe",
    "phone" => "+258844276077",
    "group" => 2
]);
```


Get a device info using their id
```php
$response = $culu->devices->get_device(1);
```

### For the other actions for each of the API services just refer to the API Guide on CuluSMS official website
## Contributing

You can contribute emailing me via abrito@nextgenit-mz.com or via pull request.

## Credits

- [Alexandre Brito](https://github.com/alexcrisbrito) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/alexcrisbrito/culusms-php/blob/master/LICENSE) for more information.