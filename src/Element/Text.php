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
     * @throws \ErrorException
     */
    public function withChild(ElementInterface $element): Text
    {
        throw new \ErrorException('Element cannot have children.');
    }

    /**
     * Does nothing.
     * @param string $key
     * @param string $value
     * @return Text
     * @throws \ErrorException
     */
    public function withAttribute(string $key, string $value = null): Text
    {
        throw new \ErrorException('Element cannot have attributes.');
    }
}