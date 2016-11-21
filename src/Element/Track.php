<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Track
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/track
 */
final class Track extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('track', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Track
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Track($this->attributes->add($attribute));
    }

    public function withDefault(): Track
    {
        return $this->withAttribute('default');
    }

    public function withKind(string $kind = 'subtitles'): Track
    {
        return $this->withAttribute('kind', $kind);
    }

    public function withLabel(string $label): Track
    {
        return $this->withAttribute('label', $label);
    }

    public function withSrc(string $url): Track
    {
        return $this->withAttribute('src', $url);
    }

    public function withSrcLang(string $lang): Track
    {
        return $this->withAttribute('srclang', $lang);
    }
}
