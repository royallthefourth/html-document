<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Inserted
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ins
 */
final class Inserted extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('ins', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Inserted
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Inserted($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Inserted
    {
        return new Inserted($this->attributes, $this->children->add($element));
    }

    public function withCite(string $url): Inserted
    {
        return $this->withAttribute('cite', $url);
    }

    public function withDateTime(string $dateTime): Inserted
    {
        return $this->withAttribute('datetime', $dateTime);
    }
}
