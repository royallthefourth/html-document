<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Progress
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress
 */
final class Progress extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('progress', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Progress
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Progress($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Progress
    {
        return new Progress($this->attributes, $this->children->add($element));
    }

    public function withMax($number): Progress
    {
        return $this->withAttribute('max', $number);
    }

    public function withValue($number): Progress
    {
        return $this->withAttribute('value', $number);
    }
}
