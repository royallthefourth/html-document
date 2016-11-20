<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Dual;

/**
 * Class Heading
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements
 */
final class Heading extends AbstractElement implements ParentElementInterface
{
    private $level;

    public function __construct(int $level, AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Dual("h{$level}", $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Heading
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Heading($this->level, $this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Heading
    {
        return new Heading($this->level, $this->attributes, $this->children->add($element));
    }
}
