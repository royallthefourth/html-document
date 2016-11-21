<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Output
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/output
 */
final class Output extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('output', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Output
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Output($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Output
    {
        return new Output($this->attributes, $this->children->add($element));
    }

    public function withFor(string $ids): Output
    {
        return $this->withAttribute('for', $ids);
    }

    public function withForm(string $id): Output
    {
        return $this->withAttribute('form', $id);
    }

    public function withName(string $name): Output
    {
        return $this->withAttribute('name', $name);
    }
}
