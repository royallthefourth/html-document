<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\Single;

/**
 * Class Embed
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/embed
 */
final class Embed extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new Single('embed', $attributes);
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
