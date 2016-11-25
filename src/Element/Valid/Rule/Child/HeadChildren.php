<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child;

final class HeadChildren implements ChildRuleInterface
{
    private $children;

    public function __construct(array $children = null)
    {
        $this->children = $children;
    }

    public function withChildren(array $children): ChildRuleInterface
    {
        return new HeadChildren($children);
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        // must contain title
    }
}
