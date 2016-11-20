<?php

namespace RoyallTheFourth\HtmlDocument\Tag;

use RoyallTheFourth\HtmlDocument\RenderInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

abstract class AbstractTag implements RenderInterface
{
    /** @var  $attributes AttributeSet */
    protected $attributes;
    /** @var  $name string */
    protected $name;

    protected function renderAttributes(): string
    {
        $out = '';

        foreach ($this->attributes->iterate() as $attribute) {
            $out .= ' ' . $attribute->render();
        }

        return $out;
    }
}
