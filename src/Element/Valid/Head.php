<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\HeadChildren;

/**
 * Class Head
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
final class Head extends AbstractElement implements ParentElementInterface
{
    public function __construct()
    {
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Head();
        $this->childRule = new HeadChildren();
    }

    public function withChild(ValidElementInterface $element): Head
    {
        $this->element = $this->element->withChild($element);

        return $this;
    }
}
