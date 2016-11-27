<?php
namespace RoyallTheFourth\HtmlDocument\Tag;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

final class EmptyTag implements TagInterface
{
    private $attributes;
    private $name;

    public function __construct(string $name, AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->name = $name;
    }

    public function render(): string
    {
        $attributes = $this->attributes->render();

        return "<{$this->name}{$attributes}>\n";
    }
}
