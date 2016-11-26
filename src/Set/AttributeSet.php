<?php

namespace RoyallTheFourth\HtmlDocument\Set;

use RoyallTheFourth\HtmlDocument\Attribute\AttributeInterface;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\RuleInterface;

final class AttributeSet implements SetInterface
{
    private $attributes = [];

    public function __construct(AttributeInterface $attribute = null)
    {
        if ($attribute) {
            $this->attributes[] = $attribute;
        }
    }

    public function iterate(): \Generator
    {
        foreach ($this->attributes as $attribute) {
            yield $attribute;
        }
    }

    /**
     * @param AttributeInterface $attribute
     * @return AttributeSet
     */
    public function add($attribute): AttributeSet
    {
        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * @param $set AttributeSet
     * @return AttributeSet
     */
    public function merge($set): AttributeSet
    {
        foreach ($set->iterate() as $attribute) {
            $this->add($attribute);
        }

        return $this;
    }

    public function render(): string
    {
        $output = '';

        foreach ($this->iterate() as $attribute) {
            $output .= ' ' . $attribute->render();
        }

        return $output;
    }

    public function validate(RuleInterface $rule)
    {
        $rule->withAttributes($this->attributes)->validate();
    }
}
