<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\RuleInterface;

interface ChildRuleInterface extends RuleInterface
{
    public function withChildren(array $children): ChildRuleInterface;
}
