<?php

namespace NormanHuth\NovaPrismJs;

use Illuminate\Support\Str;
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

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array<string, mixed>
     */
}
