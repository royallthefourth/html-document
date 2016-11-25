<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child;

use RoyallTheFourth\HtmlDocument\Element\Body;
use RoyallTheFourth\HtmlDocument\Element\Head;

final class HtmlChildren implements ChildRuleInterface
{
    private $children;

    public function __construct(array $children = null)
    {
        $this->children = $children;
    }

    public function withChildren(array $children): ChildRuleInterface
    {
        return new HtmlChildren($children);
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if (count($this->children) === 0) {
            throw new \Exception('html element must have children');
        }

        // TODO add check for valid head class
        if (!($this->children[0] instanceof Head)) {
            throw new \Exception('html element first child must be head');
        }

        // TODO add check for valid body class
        if (!($this->children[1] instanceof Body)) {
            throw new \Exception('html element second child must be body');
        }

        if (count($this->children) > 2) {
            throw new \Exception('html element must not have more than two children');
        }
    }
}
