<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class Anchor extends AbstractElement
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

        return "<a{$attributes}>{$children}\n</a>\n";
    }

    public function withAttribute(string $name, string $value = null): ElementInterface
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Anchor($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): ElementInterface
    {
        return new Anchor($this->attributes, $this->children->add($element));
    }

    public function withHref($href): Anchor
    {
        return $this->withAttribute('href', $href);
    }
}