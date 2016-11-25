<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class TableHeaderCell
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/th
 */
final class TableHeaderCell extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('th', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): TableHeaderCell
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new TableHeaderCell($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): TableHeaderCell
    {
        return new TableHeaderCell($this->attributes, $this->children->add($element));
    }

    public function withColSpan(int $span): TableHeaderCell
    {
        return $this->withAttribute('colspan', $span);
    }

    public function withRowSpan(int $span): TableHeaderCell
    {
        return $this->withAttribute('rowspan', $span);
    }

    public function withHeaders(string $ids): TableHeaderCell
    {
        return $this->withAttribute('headers', $ids);
    }

    public function withScope(string $scope): TableHeaderCell
    {
        return $this->withAttribute('scope', $scope);
    }
}
