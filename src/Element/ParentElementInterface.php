<?php

namespace RoyallTheFourth\HtmlDocument\Element;

interface ParentElementInterface extends ElementInterface
{
    public function withChild(ElementInterface $element);
}
