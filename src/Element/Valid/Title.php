<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\MetaDataInterface;

class Title extends AbstractElement implements ParentElementInterface, MetaDataInterface
{
    public function __construct()
    {
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Title();
    }

    public function withChild(ValidElementInterface $element): Title
    {
        $this->element = $this->element->withChild($element);
        return $this;
    }
}
