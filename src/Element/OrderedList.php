<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class OrderedList
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol
 */
final class OrderedList extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('ol', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): OrderedList
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new OrderedList($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): OrderedList
    {
        return new OrderedList($this->attributes, $this->children->add($element));
    }

    public function withReversed(): OrderedList
    {
        return $this->withAttribute('reversed');
    }

    public function withStart(int $start): OrderedList
    {
        return $this->withAttribute('start', $start);
    }

    public function withType(string $type): OrderedList
    {
        return $this->withAttribute('type', $type);
    }
}
