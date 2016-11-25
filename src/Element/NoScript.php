<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class NoScript
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/noscript
 */
final class NoScript extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('noscript', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): NoScript
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new NoScript($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): NoScript
    {
        return new NoScript($this->attributes, $this->children->add($element));
    }
}
