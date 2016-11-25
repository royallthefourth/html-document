<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Label
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/label
 */
final class Label extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('label', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Label
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Label($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Label
    {
        return new Label($this->attributes, $this->children->add($element));
    }

    public function withFor(string $id): Label
    {
        return $this->withAttribute('for', $id);
    }
}
