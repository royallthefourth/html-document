<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Canvas
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas
 */
final class Canvas extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('canvas', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Canvas
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Canvas($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Canvas
    {
        return new Canvas($this->attributes, $this->children->add($element));
    }

    public function withHeight($height): Canvas
    {
        return $this->withAttribute('height', $height);
    }

    public function withWidth($width): Canvas
    {
        return $this->withAttribute('width', $width);
    }
}
