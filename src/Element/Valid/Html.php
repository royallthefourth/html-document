<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\HtmlChildren;

/**
 * Class Html
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 */
final class Html extends AbstractElement implements ParentElementInterface
{
    public function __construct()
    {
        $this->childRule = new HtmlChildren();
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Html();
    }

    public function withChild(ValidElementInterface $element): Html
    {
        $this->element = $this->element->withChild($element);

        return $this;
    }
}
