<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;

interface ValidElementInterface extends ElementInterface
{
    // this one gets a special method in addition to an interface because it
    // requires knowing about both parents and children
    public function isPhrasing(): bool;
}
