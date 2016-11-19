<?php

namespace RoyallTheFourth\HtmlDocument\Attribute;

final class StandardAttribute implements AttributeInterface
{
    private $name;
    private $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function render(): string
    {
        return "{$this->name}=\"{$this->value}\"";
    }
}