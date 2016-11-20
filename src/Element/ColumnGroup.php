<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class ColumnGroup
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/colgroup
 */
final class ColumnGroup extends AbstractElement
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

        return "<colgroup{$attributes}>{$children}\n</colgroup>\n";
    }

    public function withAttribute(string $name, string $value = null): ColumnGroup
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new ColumnGroup($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): ColumnGroup
    {
        return new ColumnGroup($this->attributes, $this->children->add($element));
    }

    public function withSpan(int $span = 1): ColumnGroup
    {
        return $this->withAttribute('span', $span);
    }
}
