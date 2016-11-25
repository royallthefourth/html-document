<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;

interface ParentElementInterface extends ElementInterface
{
    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null);
}
