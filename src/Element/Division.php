<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Division
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div
 */
final class Division extends AbstractElement
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

        return "<div{$attributes}>{$children}\n</div>\n";
    }

    public function withAttribute(string $name, string $value = null): Division
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Division($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Division
    {
        return new Division($this->attributes, $this->children->add($element));
    }
}
