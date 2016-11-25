<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class OptionGroup
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/optgroup
 */
final class OptionGroup extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('optgroup', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): OptionGroup
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new OptionGroup($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): OptionGroup
    {
        return new OptionGroup($this->attributes, $this->children->add($element));
    }

    public function withDisabled(): OptionGroup
    {
        return $this->withAttribute('disabled');
    }

    public function withLabel(string $label): OptionGroup
    {
        return $this->withAttribute('label', $label);
    }
}
