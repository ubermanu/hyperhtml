# PHP Elements

[![Tests](https://github.com/ubermanu/php-elements/actions/workflows/tests.yml/badge.svg)](https://github.com/ubermanu/php-elements/actions/workflows/tests.yml)

HTML elements abstraction for PHP.

## Installation

```bash
composer require ubermanu/php-elements
```

## Usage

```php
<?php
echo el('p', 'Hello world!'); // <p>Hello world!</p>
```

## Custom elements

You can create custom elements by extending the `Element` class.

```php
<?php
$customElement = new class extends \Ubermanu\PhpElements\Element
{
    protected string $tag = 'p';
    protected array $attributes = [ 'title' => 'My custom element' ];
}

echo $customElement; // <p title="My custom element"></p>
```

## Example

The following example will render a simple HTML login form.

```php
<?php

$form = el('form', [
    el('input', [
        'type' => 'text',
        'name' => 'username',
        'placeholder' => 'Username',
    ]),
    el('input', [
        'type' => 'password',
        'name' => 'password',
        'placeholder' => 'Password',
    ]),
    el('button', 'Login'),
]);

echo $form;
```
