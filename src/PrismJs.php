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

        return parent::jsonSerialize();
    }

    /**
     * Prepare the field for JSON serialization.
     *
     * @return array<string, mixed>
     */
//    public function jsonSerialize(): array
//    {
//        /** @phpstan-ignore-next-line */
//        return with(app(NovaRequest::class), function ($request) {
//            $value = $this->value ?? $this->resolveDefaultValue($request);
//            $value = paresMarkdown($value);
//
//            return array_merge([
//                'attribute' => $this->attribute,
//                'component' => $this->component(),
//                'dependentComponentKey' => $this->dependentComponentKey(),
//                'dependsOn' => $this->getDependentsAttributes($request),
//                'displayedAs' => $this->displayedAs,
//                'fullWidth' => $this->fullWidth,
//                'helpText' => $this->getHelpText(),
//                'indexName' => $this->name,
//                'name' => $this->name,
//                'nullable' => $this->nullable,
//                'panel' => $this->panel,
//                'placeholder' => $this->placeholder,
//                'prefixComponent' => true,
//                'readonly' => $this->isReadonly($request),
//                'required' => $this->isRequired($request),
//                'sortable' => $this->sortable,
//                'sortableUriKey' => $this->sortableUriKey(),
//                'stacked' => $this->stacked,
//                'textAlign' => $this->textAlign,
//                'uniqueKey' => sprintf(
//                    '%s-%s-%s',
//                    $this->attribute,
//                    Str::slug($this->panel ?? 'default'),
//                    $this->component()
//                ),
//                'usesCustomizedDisplay' => $this->usesCustomizedDisplay,
//                'validationKey' => $this->validationKey(),
//                'value' => $value,
//                'visible' => $this->visible,
//                'wrapping' => $this->wrapping,
//            ], $this->meta());
//        });
//    }
}
