<?php
namespace RoyallTheFourth\HtmlDocument\Tag;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

final class EmptyTag extends AbstractTag
{
    public function __construct(string $name, AttributeSet $attributes = null)
    {
        $this->attributes = $attributes;
        $this->name = $name;
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<{$this->name}{$attributes}>\n";
    }
}
