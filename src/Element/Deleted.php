<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Deleted
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/del
 */
final class Deleted extends AbstractElement
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

        return "<del{$attributes}>{$children}\n</del>\n";
    }

    public function withAttribute(string $name, string $value = null): Deleted
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Deleted($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Deleted
    {
        return new Deleted($this->attributes, $this->children->add($element));
    }

    public function withCite(string $url): Deleted
    {
        return $this->withAttribute('cite', $url);
    }

    public function withDateTime(string $dateTime): Deleted
    {
        return $this->withAttribute('datetime', $dateTime);
    }
}
