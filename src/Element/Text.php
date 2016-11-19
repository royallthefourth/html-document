<?php

namespace RoyallTheFourth\HtmlDocument\Element;

final class Text implements ElementInterface
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return $this->text;
    }

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return ElementInterface
     */
    public function addChild(ElementInterface $element): ElementInterface
    {
        return $this;
    }

    /**
     * Does nothing.
     * @param string $key
     * @param string $value
     * @return ElementInterface
     */
    public function addAttribute(string $key, string $value = null): ElementInterface
    {
        return $this;
    }
}