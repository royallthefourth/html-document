<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Strike
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s
 */
final class Strike extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('s', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Strike
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Strike($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Strike
    {
        return new Strike($this->attributes, $this->children->add($element));
    }
}
