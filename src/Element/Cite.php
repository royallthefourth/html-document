<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Cite
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite
 */
final class Cite extends AbstractElement
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

        return "<cite{$attributes}>{$children}\n</cite>\n";
    }

    public function withAttribute(string $name, string $value = null): Cite
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Cite($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Cite
    {
        return new Cite($this->attributes, $this->children->add($element));
    }
}
