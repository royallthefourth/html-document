<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Pre
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre
 */
final class Pre extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('pre', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Pre
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Pre($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): Pre
    {
        return new Pre($this->attributes, $this->children->add($element));
    }
}
