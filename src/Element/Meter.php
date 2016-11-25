<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Meter
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meter
 */
final class Meter extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('meter', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Meter
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Meter($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): Meter
    {
        return new Meter($this->attributes, $this->children->add($element));
    }
    
    public function withValue($number): Meter
    {
        return $this->withAttribute('value', $number);
    }

    public function withLow($number): Meter
    {
        return $this->withAttribute('low', $number);
    }

    public function withHigh($number): Meter
    {
        return $this->withAttribute('high', $number);
    }

    public function withMin($number): Meter
    {
        return $this->withAttribute('min', $number);
    }

    public function withMax($number): Meter
    {
        return $this->withAttribute('max', $number);
    }

    public function withOptimum($number): Meter
    {
        return $this->withAttribute('optimum', $number);
    }

    public function withForm(string $id): Meter
    {
        return $this->withAttribute('form', $id);
    }
}
