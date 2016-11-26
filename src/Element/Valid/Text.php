<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

final class Text implements ValidElementInterface
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return htmlspecialchars($this->text);
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

    public function isPhrasing(): bool
    {
        return true;
    }
}
