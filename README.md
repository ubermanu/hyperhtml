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
use function Ubermanu\Hyperhtml\h;
echo h('p', 'Hello world!'); // <p>Hello world!</p>
```

Check out the [documentation](https://ubermanu.github.io/hyperhtml/) for more examples.
