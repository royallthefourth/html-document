<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Embed
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/embed
 */
final class Embed extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<embed{$attributes}>\n";
    }

    public function withAttribute(string $name, string $value = null): Embed
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Embed($this->attributes->add($attribute));
    }

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return Embed
     * @throws \ErrorException
     */
    public function withChild(ElementInterface $element): Embed
    {
        throw new \ErrorException('Element cannot have children');
    }

    public function withHeight(int $pixels): Embed
    {
        return $this->withAttribute('height', $pixels);
    }

    public function withWidth(int $pixels): Embed
    {
        return $this->withAttribute('width', $pixels);
    }

    public function withSrc(string $url): Embed
    {
        return $this->withAttribute('src', $url);
    }

    public function withType(string $mime): Embed
    {
        return $this->withAttribute('type', $mime);
    }
}
