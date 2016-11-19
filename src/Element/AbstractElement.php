<?php
namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

abstract class AbstractElement implements ElementInterface
{
    /** @var  $attributes AttributeSet */
    protected $attributes;
    /** @var  $children ElementSet */
    protected $children;

    protected function renderAttributes(): string
    {
        $out = '';

        foreach($this->attributes->iterate() as $attribute)
        {
            $out .= ' ' . $attribute->render();
        }

        return $out;
    }

    protected function renderChildren(): string
    {
        $out = '';

        foreach($this->children->iterate() as $child)
        {
            $out .= "\n" . $child->render();
        }

        return $out;
    }
}