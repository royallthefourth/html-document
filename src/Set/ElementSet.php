<?php

namespace RoyallTheFourth\HtmlDocument\Set;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;

final class ElementSet implements ElementSetInterface
{
    private $elements = [];

    public function __construct(ElementInterface $element = null)
    {
        if ($element) {
            $this->elements[] = $element;
        }
    }

    public function iterate(): \Generator
    {
        foreach ($this->elements as $element) {
            yield $element;
        }
    }

    /**
     * @param $element ElementInterface
     * @return ElementSet
     */
    public function add($element): ElementSet
    {
        $this->elements[] = $element;
        return $this;
    }

    /**
     * @param $set ElementSet
     * @return ElementSet
     */
    public function merge($set): ElementSet
    {
        foreach ($set->iterate() as $element) {
            $this->add($element);
        }

        return $this;
    }

    public function render(): string
    {
        $output = '';

        foreach ($this->iterate() as $element) {
            $output .= $element->render() . "\n";
        }

        return $output;
    }

    public function validate(ChildRuleInterface $rule)
    {
        $rule->withChildren($this->elements)->validate();
    }
}
