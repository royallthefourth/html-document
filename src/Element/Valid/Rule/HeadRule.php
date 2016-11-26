<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule;

use RoyallTheFourth\HtmlDocument\Element\Base;
use RoyallTheFourth\HtmlDocument\Element\Valid\Title;

final class HeadRule implements RuleInterface
{
    private $attributes;
    private $children;

    public function __construct(array $children = null, array $attributes = null)
    {
        $this->attributes = $attributes;
        $this->children = $children;
    }

    public function withAttributes(array $attributes): RuleInterface
    {
        return new HeadRule($this->children, $attributes);
    }

    public function withChildren(array $children): RuleInterface
    {
        return new HeadRule($children, $this->attributes);
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        $titles = 0;
        $bases = 0;

        foreach ($this->children as $child) {
            if ($child instanceof Base || $child instanceof \RoyallTheFourth\HtmlDocument\Element\Valid\Base) {
                $bases++;
            }

            if ($child instanceof Title || $child instanceof \RoyallTheFourth\HtmlDocument\Element\Title) {
                $titles++;
            }
        }

        if ($titles !== 1) {
            throw new \Exception("head should contain one title element but contains {$titles}");
        }

        if ($bases > 1) {
            throw new \Exception("head should contain no more than one base element but contains {$bases}");
        }
    }
}