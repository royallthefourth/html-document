<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Code
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/code
 */
final class Code extends AbstractElement
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

        return "<code{$attributes}>{$children}\n</code>\n";
    }

    public function withAttribute(string $name, string $value = null): Code
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Code($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Code
    {
        return new Code($this->attributes, $this->children->add($element));
    }
}
