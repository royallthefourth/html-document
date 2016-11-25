<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Select
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/select
 */
final class Select extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('select', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Select
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Select($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Select
    {
        return new Select($this->attributes, $this->children->add($element));
    }

    public function withAutoFocus(): Select
    {
        return $this->withAttribute('autofocus');
    }

    public function withDisabled(): Select
    {
        return $this->withAttribute('disabled');
    }

    public function withForm(string $id): Select
    {
        return $this->withAttribute('form', $id);
    }

    public function withMultiple(): Select
    {
        return $this->withAttribute('multiple');
    }

    public function withName(string $name): Select
    {
        return $this->withAttribute('name', $name);
    }

    public function withRequired(): Select
    {
        return $this->withAttribute('required');
    }

    public function withSelected(): Select
    {
        return $this->withAttribute('selected');
    }

    public function withSize(int $rows): Select
    {
        return $this->withAttribute('size', $rows);
    }
}
