<?php

namespace RoyallTheFourth\HtmlDocument;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class Document implements RenderInterface
{
    private $elements;

    public function __construct(ElementSet $elements = null)
    {
        $this->elements = $elements ?? new ElementSet();
    }

    public function add(ElementInterface $element): Document
    {
        return new Document($this->elements->add($element));
    }

    public function render(): string
    {
        $output = $this->elements->render();

        return "<!DOCTYPE html>\n{$output}";
    }
}
