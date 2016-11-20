<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class BiDirectionalOverride
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdo
 */
final class BiDirectionalOverride extends AbstractElement
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

        return "<bdo{$attributes}>{$children}\n</bdo>\n";
    }

    public function withAttribute(string $name, string $value = null): BiDirectionalOverride
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new BiDirectionalOverride($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): BiDirectionalOverride
    {
        return new BiDirectionalOverride($this->attributes, $this->children->add($element));
    }

    public function withDir(string $direction): BiDirectionalOverride
    {
        return $this->withAttribute('dir', $direction);
    }
}