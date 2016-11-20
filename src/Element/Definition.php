<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Definition
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn
 */
final class Definition extends AbstractElement
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

        return "<dfn{$attributes}>{$children}\n</dfn>\n";
    }

    public function withAttribute(string $name, string $value = null): Definition
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Definition($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Definition
    {
        return new Definition($this->attributes, $this->children->add($element));
    }
}
