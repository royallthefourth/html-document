<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Anchor
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
final class Anchor extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<a{$attributes}>{$children}\n</a>\n";
    }

    public function withAttribute(string $name, string $value = null): Anchor
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Anchor($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Anchor
    {
        return new Anchor($this->attributes, $this->children->add($element));
    }

    public function withHref($href): Anchor
    {
        return $this->withAttribute('href', $href);
    }

    public function withDownload($filename = null): Anchor
    {
        return $this->withAttribute('download', $filename);
    }

    public function withHrefLang($lang): Anchor
    {
        return $this->withAttribute('hreflang', $lang);
    }

    public function withPing($url): Anchor
    {
        return $this->withAttribute('ping', $url);
    }

    public function withRel($rel): Anchor
    {
        return $this->withAttribute('rel', $rel);
    }

    public function withTarget($target): Anchor
    {
        return $this->withAttribute('target', $target);
    }

    public function withType($type): Anchor
    {
        return $this->withAttribute('type', $type);
    }
}
