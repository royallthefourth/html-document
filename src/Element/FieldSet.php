<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class FieldSet
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/fieldset
 */
final class FieldSet extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('fieldset', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): FieldSet
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new FieldSet($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): FieldSet
    {
        return new FieldSet($this->attributes, $this->children->add($element));
    }

    public function withDisabled(): FieldSet
    {
        return $this->withAttribute('disabled');
    }

    public function withForm(string $id): FieldSet
    {
        return $this->withAttribute('form', $id);
    }

    public function withName(string $name): FieldSet
    {
        return $this->withAttribute('name', $name);
    }
}
