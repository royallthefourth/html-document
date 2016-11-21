<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Anchor
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
final class Anchor extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('a', $attributes, $children);
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
