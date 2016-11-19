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
     * @return Text
     */
    public function withChild(ElementInterface $element): Text
    {
        return $this;
    }

    /**
     * Does nothing.
     * @param string $key
     * @param string $value
     * @return Text
     */
    public function withAttribute(string $key, string $value = null): Text
    {
        return $this;
    }
}