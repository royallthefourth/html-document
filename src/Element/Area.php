<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Area
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/area
 */
final class Area extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<area{$attributes} />\n";
    }

    public function withAttribute(string $name, string $value = null): Area
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Area($this->attributes->add($attribute));
    }

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return Area
     */
    public function withChild(ElementInterface $element): Area
    {
        return $this;
    }

    public function withAlt($text): Area
    {
        return $this->withAttribute('alt', $text);
    }

    public function withCoords($coords): Area
    {
        return $this->withAttribute('coords', $coords);
    }

    public function withDownload($filename = null): Area
    {
        return $this->withAttribute('download', $filename);
    }

    public function withHref($href): Area
    {
        return $this->withAttribute('href', $href);
    }

    public function withHrefLang($lang): Area
    {
        return $this->withAttribute('hreflang', $lang);
    }

    public function withMedia($media): Area
    {
        return $this->withAttribute('media', $media);
    }

    public function withRel($rel): Area
    {
        return $this->withAttribute('rel', $rel);
    }

    public function withShape($shape): Area
    {
        return $this->withAttribute('shape', $shape);
    }

    public function withTarget($target): Area
    {
        return $this->withAttribute('target', $target);
    }

    public function withType($type): Anchor
    {
        return $this->withAttribute('type', $type);
    }
}
