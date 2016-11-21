<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Source
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/source
 */
final class Source extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('source', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Source
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Source($this->attributes->add($attribute));
    }

    public function withSrc(string $url): Source
    {
        return $this->withAttribute('src', $url);
    }

    public function withType(string $mime): Source
    {
        return $this->withAttribute('type', $mime);
    }
}
