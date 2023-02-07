<h1>Hyperhtml 🦾</h1>

HTML elements abstraction for PHP inspired by [hyperscript](https://github.com/hyperhype/hyperscript).

## Installation

```bash
composer require ubermanu/hyperhtml
```

## Usage

```php
use function Ubermanu\Hyperhtml\h;

echo h('p', 'Hello world!'); // <p>Hello world!</p>
```

### Attributes

The attributes are passed as an array to the second argument of the `html` function.\
If the attribute value is empty or false, the attribute will not be rendered.\
If the attribute value is true, the attribute will be rendered without a value.

```php
use function Ubermanu\Hyperhtml\h;

$div = h('div', [
    'class' => 'someClassName',
    'checked' => true,
    'disabled' => false,
]);

echo $div; // <div class="someClassName" checked></div>
```

### Children

The children are passed as an array to the third argument of the `html` function.\
The children can be strings, numbers, or other elements.

```php
use function Ubermanu\Hyperhtml\h;

$div = h('div', [], [
    h('p', 'Hello world!'),
    h('p', 'Hello world!'),
]);

echo $div; // <div><p>Hello world!</p><p>Hello world!</p></div>
```

### Example

The following example will render a simple HTML login form.

```php
use function Ubermanu\Hyperhtml\h;

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

The fragments are a way to render multiple elements at once, without the need to wrap them in a parent element.

See the [MDN documentation](https://developer.mozilla.org/en-US/docs/Web/API/DocumentFragment) for more information.

```php
use function Ubermanu\Hyperhtml\fragment;
use function Ubermanu\Hyperhtml\h;

$fragment = fragment(
    h('li', 'One'),
    h('li', 'Two'),
);

$list = h('ul', [
    $fragment,
    h('li', 'Three'),
]);

echo $list; // <ul><li>One</li><li>Two</li><li>Three</li></ul>
```

### Custom elements

Rendering custom elements is as simple as extending the `Element` class and passing the tag name to the parent constructor.

It can be useful to create a custom `html` function that will return an instance of the custom element.

```php
use function Ubermanu\Hyperhtml\Element;
use function Ubermanu\Hyperhtml\h;

class CustomElement extends Element
{
    public function __construct()
    {
        parent::__construct('my-element');
    }
}

$customElement = h('div', [
    new CustomElement(),
]);

echo $customElement; // <div><my-element></my-element></div>
```

### Classnames

The `classnames` function can be used to generate a string of class names from an array and its truthy values.

```php
use function Ubermanu\Hyperhtml\classnames;

$div = h('div', [
    'class' => classnames([
        'someClassName' => true,
        'anotherClassName' => true,
        'disabledClassName' => false,
    ]),
]);

echo $div; // <div class="someClassName anotherClassName"></div>
```
