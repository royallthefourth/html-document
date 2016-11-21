<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Option
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/option
 */
final class Option extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('option', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Option
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Option($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Option
    {
        return new Option($this->attributes, $this->children->add($element));
    }

    public function withDisabled(): Option
    {
        return $this->withAttribute('disabled');
    }

    public function withLabel(string $label): Option
    {
        return $this->withAttribute('label', $label);
    }

    public function withSelected(): Option
    {
        return $this->withAttribute('selected');
    }

    public function withLValue(string $value): Option
    {
        return $this->withAttribute('value', $value);
    }
}
