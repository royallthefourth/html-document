<?php

namespace RoyallTheFourth\HtmlDocument\Attribute;

final class BooleanAttribute implements AttributeInterface
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render(): string
    {
        return $this->name;
    }
}
