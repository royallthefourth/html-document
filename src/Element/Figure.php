<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Figure
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure
 */
final class Figure extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('figure', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Figure
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Figure($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Figure
    {
        return new Figure($this->attributes, $this->children->add($element));
    }
}
