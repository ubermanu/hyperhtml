# Hyperhtml

[![Tests](https://github.com/ubermanu/hyperhtml/actions/workflows/tests.yml/badge.svg)](https://github.com/ubermanu/hyperhtml/actions/workflows/tests.yml)

HTML elements abstraction for PHP.

## Installation

```bash
composer require ubermanu/hyperhtml
```

## Usage

```php
<?php
use function Ubermanu\Hyperhtml\html as h;
echo h('p', 'Hello world!'); // <p>Hello world!</p>
```

## Example

The following example will render a simple HTML login form.

```php
<?php
use function Ubermanu\Hyperhtml\html as h;

$form = h('form', [
    h('input', [
        'type' => 'text',
        'name' => 'username',
        'placeholder' => 'Username',
    ]),
    h('input', [
        'type' => 'password',
        'name' => 'password',
        'placeholder' => 'Password',
    ]),
    h('button', 'Login'),
]);

echo $form;
```
