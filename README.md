# Nova Prism.js

A Nova detail field with Syntax Highlighter via [Prism.js](https://prismjs.com/). Usable with Markdown or HTML.

[Preview](https://knowledge-base.huth.it/resources/articles/1)

## Installation

```shell
composer require norman-huth/nova-prism-js
```

## Usage

```php

use NormanHuth\NovaPrismJs\PrismJs;

//..
    public function fields(NovaRequest $request): array
    {
        return [
            //..
              PrismJs::make(__('Content'), 'content'),
            //..
        ]
    }

```

## Options

### Full Width

```php
PrismJs::make(__('Content'), 'content')->fullWidth(),
```


### Use HTML instead of Markdown

```php
PrismJs::make(__('Content'), 'content')->disableMarkdown(),
```
