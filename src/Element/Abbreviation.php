<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Abbreviation
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr
 */
final class Abbreviation extends AbstractElement
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

        return "<abbr{$attributes}>{$children}\n</abbr>\n";
    }

    public function withAttribute(string $name, string $value = null): Abbreviation
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Abbreviation($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Abbreviation
    {
        return new Abbreviation($this->attributes, $this->children->add($element));
    }

    public function withTitle(string $title): Abbreviation
    {
        return $this->withAttribute('title', $title);
    }
}