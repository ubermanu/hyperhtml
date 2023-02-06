<h1>Hyperhtml 🦾</h1>

HTML elements abstraction for PHP inspired by [hyperhtml](https://github.com/WebReflection/hyperHTML).

## Installation

```bash
composer require ubermanu/hyperhtml
```

## Usage

```php
use function Ubermanu\Hyperhtml\html as h;

echo h('p', 'Hello world!'); // <p>Hello world!</p>
```

### Example

The following example will render a simple HTML login form.

```php
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

echo $form; // <form>...</form>
```

### Fragments

```php
use function Ubermanu\Hyperhtml\fragment;
use function Ubermanu\Hyperhtml\html as h;

$fragment = fragment(
    h('p', 'Hello world!'),
    h('p', 'Hello world!'),
);

echo $fragment; // <p>Hello world!</p><p>Hello world!</p>
```
