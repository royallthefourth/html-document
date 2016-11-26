<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule;

use RoyallTheFourth\HtmlDocument\Element\Valid\Body;
use RoyallTheFourth\HtmlDocument\Element\Valid\Head;

final class HtmlRule implements RuleInterface
{
    private $attributes;
    private $children;

    public function __construct(array $children = null, array $attributes = null)
    {
        $this->children = $children;
    }

    public function withAttributes(array $attributes): RuleInterface
    {
        return new HtmlRule($this->children, $attributes);
    }

    public function withChildren(array $children): RuleInterface
    {
        return new HtmlRule($children, $this->attributes);
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if (count($this->children) === 0) {
            throw new \Exception('html element must have children');
        }

        if (!($this->children[0] instanceof Head)) {
            throw new \Exception('html element first child must be head');
        }

        if (!($this->children[1] instanceof Body)) {
            throw new \Exception('html element second child must be body');
        }

        if (count($this->children) > 2) {
            throw new \Exception('html element must not have more than two children');
        }
    }
}
