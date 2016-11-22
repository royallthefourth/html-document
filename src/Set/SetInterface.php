<?php

namespace RoyallTheFourth\HtmlDocument\Set;

use RoyallTheFourth\HtmlDocument\RenderInterface;

interface SetInterface extends RenderInterface
{
    public function iterate();
    public function add($item);
    public function merge($set);
}
