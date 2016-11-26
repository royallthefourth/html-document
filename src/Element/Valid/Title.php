<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\MetaDataInterface;

/**
 * @throws \Exception
 */
class Title extends AbstractElement implements ParentElementInterface, MetaDataInterface
{
    public function __construct()
    {
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Title();
    }

    public function withChild(ValidElementInterface $element): Title
    {
        if (!($element instanceof Text)) {
            throw new \Exception('title element should only contain text');
        }

        $this->element = $this->element->withChild($element);
        return $this;
    }
}
