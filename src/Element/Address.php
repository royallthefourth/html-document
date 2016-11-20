<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Address
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/address
 */
final class Address extends AbstractElement
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

        return "<address{$attributes}>{$children}\n</address>\n";
    }

    public function withAttribute(string $name, string $value = null): Address
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Address($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Address
    {
        return new Address($this->attributes, $this->children->add($element));
    }
}
