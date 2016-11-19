<?php

namespace RoyallTheFourth\HtmlDocument;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class Document implements RenderInterface
{
    private $elements;

    public function __construct(ElementSet $elements = null)
    {
        $this->elements = $elements;
        if($elements === null)
        {
            $this->elements = new ElementSet();
        }
    }

    public function add(ElementInterface $element): Document
    {
        return new Document($this->elements->add($element));
    }

    public function render(): string
    {
        $output = '';

        foreach($this->elements->iterate() as $element){
            $output .= $element->render() . "\n";
        }

        return "<!DOCTYPE html>\n{$output}";
    }
}