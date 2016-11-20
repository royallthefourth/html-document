<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Dual;

/**
 * Class Division
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div
 */
final class Division extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Dual('div', $attributes, $children);
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
