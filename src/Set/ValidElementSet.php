<?php

namespace RoyallTheFourth\HtmlDocument\Set;

use RoyallTheFourth\HtmlDocument\Element\Valid\ValidElementInterface;

final class ValidElementSet implements ElementSetInterface
{
    private $elements;

    public function __construct(ValidElementInterface $element = null)
    {
        $this->elements = new ElementSet();

        if ($element !== null) {
            $this->elements->add($element);
        }
    }

    public function iterate(): \Generator
    {
        foreach ($this->elements->iterate() as $element) {
            yield $element;
        }
    }

    /**
     * @param $element ValidElementInterface
     * @return ValidElementSet
     */
    public function add($element): ValidElementSet
    {
        $this->elements->add($element);
        return $this;
    }

    /**
     * @param $set ValidElementSet
     * @return ValidElementSet
     */
    public function merge($set): ValidElementSet
    {
        foreach ($set->iterate() as $element) {
            $this->add($element);
        }

        return $this;
    }

    public function render(): string
    {
        return $this->elements->render();
    }
}
