<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\HtmlChildInterface;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\HtmlChildren;

/**
 * Class Html
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html
 * @throws \Exception
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
        if (!($element instanceof HtmlChildInterface)) {
            throw new \Exception('Child of html must implement HtmlChildInterface');
        }

        $this->element = $this->element->withChild($element);
        return $this;
    }
}
