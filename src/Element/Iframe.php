<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Iframe
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
final class Iframe extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('iframe', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Iframe
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Iframe($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Iframe
    {
        return new Iframe($this->attributes, $this->children->add($element));
    }

    public function withAllowFullScreen(string $allow = 'false'): Iframe
    {
        return $this->withAttribute('allowfullscreen', $allow);
    }

    public function withHeight(int $pixels): Iframe
    {
        return $this->withAttribute('height', $pixels);
    }

    public function withName(string $name): Iframe
    {
        return $this->withAttribute('name', $name);
    }

    public function withSandbox(string $policy = ''): Iframe
    {
        return $this->withAttribute('sandbox', $policy);
    }

    public function withSrc(string $url): Iframe
    {
        return $this->withAttribute('src', $url);
    }

    public function withSrcDoc(string $url): Iframe
    {
        return $this->withAttribute('srcdoc', $url);
    }

    public function withWidth(int $pixels): Iframe
    {
        return $this->withAttribute('width', $pixels);
    }
}
