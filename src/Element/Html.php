<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Html
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 */
final class Html extends AbstractElement
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

        return "<html{$attributes}>{$children}\n</html>\n";
    }

    public function withAttribute(string $name, string $value = null): Html
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Html($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Html
    {
        return new Html($this->attributes, $this->children->add($element));
    }
}
