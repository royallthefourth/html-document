<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

interface ParentElementInterface extends ValidElementInterface
{
    public function withChild(ValidElementInterface $element);
}
