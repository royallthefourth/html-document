<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Image
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
 */
final class Image extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('image', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Image
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Image($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Image
    {
        return new Image($this->attributes, $this->children->add($element));
    }

    public function withAlt(string $alt): Image
    {
        return $this->withAttribute('alt', $alt);
    }

    public function withCrossOrigin(string $policy = 'anonymous'): Image
    {
        return $this->withAttribute('crossorigin', $policy);
    }

    public function withHeight(int $pixels): Image
    {
        return $this->withAttribute('height', $pixels);
    }

    public function withIsMap(): Image
    {
        return $this->withAttribute('ismap');
    }

    public function withLongDesc(string $urlOrId): Image
    {
        return $this->withAttribute('longdesc', $urlOrId);
    }

    public function withSizes(string $sizes): Image
    {
        return $this->withAttribute('sizes', $sizes);
    }

    public function withSrc(string $url): Image
    {
        return $this->withAttribute('src', $url);
    }

    public function withSrcSet(string $srcSet): Image
    {
        return $this->withAttribute('srcset', $srcSet);
    }

    public function withWidth(int $pixels): Image
    {
        return $this->withAttribute('width', $pixels);
    }

    public function withUseMap(string $id): Image
    {
        return $this->withAttribute('usemap', $id);
    }
}
