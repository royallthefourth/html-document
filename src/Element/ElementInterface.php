<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\RenderInterface;

interface ElementInterface extends RenderInterface
{
    public function addAttribute(string $key, string $value = null): ElementInterface;

    public function addChild(ElementInterface $element): ElementInterface;
}
