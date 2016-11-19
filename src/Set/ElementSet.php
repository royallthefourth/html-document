<?php

namespace RoyallTheFourth\HtmlDocument\Set;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;

final class ElementSet implements SetInterface
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
}
