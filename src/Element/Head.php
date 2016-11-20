<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Head
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
final class Head extends AbstractElement
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

        return "<head{$attributes}>{$children}\n</head>\n";
    }

    public function withAttribute(string $name, string $value = null): Head
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Head($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Head
    {
        return new Head($this->attributes, $this->children->add($element));
    }
}
