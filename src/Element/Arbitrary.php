<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Arbitrary
 * Any type of tag with a matching close tag.
 */
final class Arbitrary extends AbstractElement
{
    private $name;

    public function __construct(string $name, AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->name = $name;
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<{$this->name}{$attributes}>{$children}\n</{$this->name}>\n";
    }

    public function withAttribute(string $name, string $value = null): Arbitrary
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Arbitrary($this->name, $this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Arbitrary
    {
        return new Arbitrary($this->name, $this->attributes, $this->children->add($element));
    }
}
