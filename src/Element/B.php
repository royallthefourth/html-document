<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class B
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b
 */
final class B extends AbstractElement
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

        return "<b{$attributes}>{$children}\n</b>\n";
    }

    public function withAttribute(string $name, string $value = null): B
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new B($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): B
    {
        return new B($this->attributes, $this->children->add($element));
    }
}
