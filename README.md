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

### Change Theme

Set the Prism theme for light and dark mode.  
* Theme from [prismjs.com](https://prismjs.com/): `default`, `coy`, `dark`, `funky`, `okaidia`, `solarizedlight`, `tomorrow`, `twilight`
* Theme from [PrismJS/prism-themes](https://github.com/PrismJS/prism-themes): `a11y-dark`, `atom-dark`, `base16-ateliersulphurpool-light`, `cb`, `coldark-cold`, `coldark-dark`, `coy-without-shadows`, `darcula`, `dracula`, `duotone-dark`, `duotone-earth`, `duotone-forest`, `duotone-light`, `duotone-sea`, `duotone-space`, `ghcolors`, `gruvbox-dark`, `gruvbox-light`, `holi-theme`, `hopscotch`, `lucario`, `material-dark`, `material-light`, `material-oceanic`, `night-owl`, `nord`, `one-dark`, `one-light`, `pojoaque`, `shades-of-purple`, `solarized-dark-atom`, `synthwave84`, `vs`, `vsc-dark-plus`, `xonokai`, `z-touch`
```php
PrismJs::make(__('Content'), 'content')
    ->setTheme('tomorrow')
    ->setDarkTheme('twilight'),
```

### Full Width

```php
PrismJs::make(__('Content'), 'content')->fullWidth(),
```

### Use HTML instead of Markdown

```php
PrismJs::make(__('Content'), 'content')->disableMarkdown(),
```

---
[![More Laravel Nova Packages](https://raw.githubusercontent.com/Muetze42/asset-repo/main/svg/more-laravel-nova-packages.svg)](https://huth.it/nova-packages)

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

[![Woman. Life. Freedom.](https://raw.githubusercontent.com/Muetze42/Muetze42/2033b219c6cce0cb656c34da5246434c27919bcd/files/iran-banner-big.svg)](https://linktr.ee/CurrentPetitionsFreeIran)
