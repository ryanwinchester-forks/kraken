# Kraken

## Simple contact management

In development.

 [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/SevenShores/Kraken.svg?style=flat-square)](https://scrutinizer-ci.com/g/SevenShores/Kraken/?branch=master)
 [![Build Status](https://img.shields.io/travis/SevenShores/Kraken.svg?style=flat-square)](https://travis-ci.org/SevenShores/Kraken)


Contact Manager

```php
$contactManager = new SevenShores\Kraken\Services\ContactManager();

$relations = [
    'sync' => [
        'tags' => [1, 4, 5],
        'forms' => [3, 4],
    ],
    'detach' => [
        'forms' => [2]
    ],
    'attach' => [
        'properties' => [1,3,4,5,8]
    ]
];

$contact = $contactManager->update($contact, $email, $relations);
```
