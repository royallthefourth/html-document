<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Details
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 */
final class Details extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<details{$attributes}>{$children}\n</details>\n";
    }

    public function withAttribute(string $name, string $value = null): Details
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Details($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Details
    {
        return new Details($this->attributes, $this->children->add($element));
    }

    public function withOpen(string $open = 'false'): Details
    {
        return $this->withAttribute('open', $open);
    }
}
