<?php

namespace RoyallTheFourth\HtmlDocument\Tag;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class Standard implements TagInterface
{
    private $attributes;
    private $name;
    private $children;

    public function __construct(string $name, AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes;
        $this->children = $children;
        $this->name = $name;
    }

    public function render(): string
    {
        $attributes = $this->attributes->render();
        $children = $this->renderChildren();

        return "<{$this->name}{$attributes}>{$children}\n</{$this->name}>\n";
    }

    private function renderChildren(): string
    {
        $out = '';

        foreach ($this->children->iterate() as $child) {
            $out .= "\n" . $child->render();
        }

        return $out;
    }
}
