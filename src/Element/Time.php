<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Time
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time
 */
final class Time extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('time', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Time
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Time($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): Time
    {
        return new Time($this->attributes, $this->children->add($element));
    }

    /**
     * @see http://www.w3.org/TR/html-markup/datatypes.html#common.data.datetime
     */
    public function withDateTime(string $dateTime): Time
    {
        return $this->withAttribute('datetime', $dateTime);
    }
}
