<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Attribute;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\RuleInterface;

interface AttributeRuleInterface extends RuleInterface
{
    public function withAttributes(array $attributes): AttributeRuleInterface;
}
