<?php

namespace RoyallTheFourth\HtmlDocument;

use RoyallTheFourth\HtmlDocument\Element\Valid\ValidElementInterface;
use RoyallTheFourth\HtmlDocument\Set\ValidElementSet;

final class ValidDocument implements RenderInterface
{
    private $document;

    public function __construct(ValidElementSet $elements = null)
    {
        $this->document = new Document($elements);
    }

    public function add(ValidElementInterface $element): ValidDocument
    {
        return new ValidDocument($this->document->add($element));
    }

    public function render(): string
    {
        return $this->document->render();
    }
}
