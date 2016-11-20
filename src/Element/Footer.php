<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Footer
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/footer
 */
final class Footer extends AbstractElement
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

        return "<footer{$attributes}>{$children}\n</footer>\n";
    }

    public function withAttribute(string $name, string $value = null): Footer
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Footer($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Footer
    {
        return new Footer($this->attributes, $this->children->add($element));
    }
}
