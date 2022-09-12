# PHP Elements

Integrated HTML elements for PHP.

## Installation

```bash
composer require ubermanu/php-elements
```

## Usage

```php
<?php
echo el('p', 'Hello world!')->render(); // <p>Hello world!</p>
```

## Custom elements

```php
<?php
class MyElement extends \Ubermanu\PhpElements\CustomElement
{
    protected string $tag = 'p';
    
    protected array $attributes = [
        'title' => 'My custom element',
    ];
}
```

Render the element:

```php
echo (new MyElement())->render(); // <p title="My custom element"></p>
```

## Example

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

echo $form->render();
```
