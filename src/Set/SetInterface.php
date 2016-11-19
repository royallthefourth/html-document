<?php

namespace RoyallTheFourth\HtmlDocument\Set;

interface SetInterface
{
    public function iterate();
    public function add($item);
    public function merge($set);
}