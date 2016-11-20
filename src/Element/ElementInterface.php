<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\RenderInterface;

interface ElementInterface extends RenderInterface
{
    public function withAttribute(string $key, string $value = null);
}
