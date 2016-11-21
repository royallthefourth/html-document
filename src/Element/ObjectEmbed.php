<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class ObjectEmbed
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/object
 */
final class ObjectEmbed extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('object', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): ObjectEmbed
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new ObjectEmbed($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): ObjectEmbed
    {
        return new ObjectEmbed($this->attributes, $this->children->add($element));
    }

    public function withData(string $url): ObjectEmbed
    {
        return $this->withAttribute('data', $url);
    }

    public function withForm(string $id): ObjectEmbed
    {
        return $this->withAttribute('form', $id);
    }

    public function withHeight(int $pixels): ObjectEmbed
    {
        return $this->withAttribute('height', $pixels);
    }

    public function withName(string $name): ObjectEmbed
    {
        return $this->withAttribute('name', $name);
    }

    /**
     * @param string $mime
     * @return ObjectEmbed
     * @see http://www.iana.org/assignments/media-types/media-types.xhtml
     */
    public function withType(string $mime): ObjectEmbed
    {
        return $this->withAttribute('type', $mime);
    }

    public function withTypeMustMatch(): ObjectEmbed
    {
        return $this->withAttribute('typemustmatch');
    }

    public function withUseMap(string $name): ObjectEmbed
    {
        return $this->withAttribute('usemap', $name);
    }

    public function withWidth(int $pixels): ObjectEmbed
    {
        return $this->withAttribute('width', $pixels);
    }
}
