<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\HtmlChildInterface;
use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\MetaDataInterface;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\HeadRule;

/**
 * Class Head
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/head
 */
final class Head extends AbstractElement implements ParentElementInterface, HtmlChildInterface
{
    public function __construct()
    {
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Head();
        $this->validationRule = new HeadRule();
    }

    public function withChild(ValidElementInterface $element): Head
    {
        if (!($element instanceof MetaDataInterface)) {
            throw new \Exception('Child of head must implement MetaDataInterface');
        }

        $this->element = $this->element->withChild($element);
        return $this;
    }
}
