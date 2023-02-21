<?php

namespace NormanHuth\NovaPrismJs;

use Illuminate\Support\Str;
use JetBrains\PhpStorm\ExpectedValues;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class PrismJs extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-prism-js';

    /**
     * Converts GitHub flavored Markdown into HTML.
     *
     * @var bool
     */
    public bool $convertMarkdown = true;

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var (callable():(bool))|bool
     */
    public $showOnIndex = false;

    /**
     * Indicates if the element should be shown on the detail view.
     *
     * @var (callable():(bool))|bool
     */
    public $showOnDetail = true;

    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var (callable(NovaRequest):(bool))|bool
     */
    public $showOnCreation = false;

    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var (callable(NovaRequest, mixed):(bool))|bool
     */
    public $showOnUpdate = false;

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->withMeta([
            'theme' => 'theme-coy',
            'darkTheme' => 'dark-theme-okaidia',
        ]);
    }

    /**
     * Set Prism.js theme
     *
     * @param string $theme
     * @return PrismJs
     */
    public function setTheme(
        #[ExpectedValues(values: ['default', 'coy', 'dark', 'funky', 'okaidia', 'solarizedlight', 'tomorrow', 'twilight', 'a11y-dark', 'atom-dark', 'base16-ateliersulphurpool-light', 'cb', 'coldark-cold', 'coldark-dark', 'coy-without-shadows', 'darcula', 'dracula', 'duotone-dark', 'duotone-earth', 'duotone-forest', 'duotone-light', 'duotone-sea', 'duotone-space', 'ghcolors', 'gruvbox-dark', 'gruvbox-light', 'holi-theme', 'hopscotch', 'lucario', 'material-dark', 'material-light', 'material-oceanic', 'night-owl', 'nord', 'one-dark', 'one-light', 'pojoaque', 'shades-of-purple', 'solarized-dark-atom', 'synthwave84', 'vs', 'vsc-dark-plus', 'xonokai', 'z-touch',])]
        string $theme
    ): static
    {
        $this->withMeta([
            'theme' => 'theme-'.$theme,
        ]);

        return $this;
    }

    /**
     * Set Prism.js dark mode theme
     *
     * @param string $theme
     * @return PrismJs
     */
    public function setDarkTheme(
        #[ExpectedValues(values: ['default', 'coy', 'dark', 'funky', 'okaidia', 'solarizedlight', 'tomorrow', 'twilight', 'a11y-dark', 'atom-dark', 'base16-ateliersulphurpool-light', 'cb', 'coldark-cold', 'coldark-dark', 'coy-without-shadows', 'darcula', 'dracula', 'duotone-dark', 'duotone-earth', 'duotone-forest', 'duotone-light', 'duotone-sea', 'duotone-space', 'ghcolors', 'gruvbox-dark', 'gruvbox-light', 'holi-theme', 'hopscotch', 'lucario', 'material-dark', 'material-light', 'material-oceanic', 'night-owl', 'nord', 'one-dark', 'one-light', 'pojoaque', 'shades-of-purple', 'solarized-dark-atom', 'synthwave84', 'vs', 'vsc-dark-plus', 'xonokai', 'z-touch',])]
        string $theme
    ): static
    {
        $this->withMeta([
            'darkTheme' => 'dark-theme-'.$theme,
        ]);

        return $this;
    }

    /**
     * Don’t convert GitHub flavored Markdown into HTML.
     *
     * @return $this
     */
    public function disableMarkdown(): static
    {
        $this->convertMarkdown = false;

        return $this;
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        if ($this->convertMarkdown) {
            $this->value = Str::markdown($this->value);
        }

        $this->value = str_replace('<a ', '<a target="_blank" rel="opener" ', $this->value);

        return parent::jsonSerialize();
    }
}
