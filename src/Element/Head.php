<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Head
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
final class Head extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('head', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Head
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Head($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): Head
    {
        return new Head($this->attributes, $this->children->add($element));
    }
}
