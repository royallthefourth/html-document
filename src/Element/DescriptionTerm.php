<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class DescriptionTerm
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dt
 */
final class DescriptionTerm extends AbstractElement
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

        return "<dt{$attributes}>{$children}\n</dt>\n";
    }

    public function withAttribute(string $name, string $value = null): DescriptionTerm
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new DescriptionTerm($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): DescriptionTerm
    {
        return new DescriptionTerm($this->attributes, $this->children->add($element));
    }
}
