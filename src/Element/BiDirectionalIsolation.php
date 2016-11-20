<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class BiDirectionalIsolation
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdi
 */
final class BiDirectionalIsolation extends AbstractElement
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

        return "<bdi{$attributes}>{$children}\n</bdi>\n";
    }

    public function withAttribute(string $name, string $value = null): BiDirectionalIsolation
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new BiDirectionalIsolation($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): BiDirectionalIsolation
    {
        return new BiDirectionalIsolation($this->attributes, $this->children->add($element));
    }
}
