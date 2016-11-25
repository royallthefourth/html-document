<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Caption
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/caption
 */
final class Caption extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('caption', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Caption
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Caption($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Caption
    {
        return new Caption($this->attributes, $this->children->add($element));
    }
}
