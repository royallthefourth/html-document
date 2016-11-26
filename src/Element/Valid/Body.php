<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\HtmlRule;

class Body extends AbstractElement
{
    public function __construct()
    {
        $this->validationRule = new HtmlRule();
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Body();
    }

    public function withChild(ValidElementInterface $element): Body
    {
        $this->element = $this->element->withChild($element);
        return $this;
    }
}
