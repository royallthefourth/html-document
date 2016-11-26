<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid\Rule;

interface RuleInterface
{
    public function withAttributes(array $attributes): RuleInterface;
    public function withChildren(array $children): RuleInterface;
    public function validate();
}
