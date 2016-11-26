<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\MetaDataInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Script
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
final class Script extends AbstractElement implements ParentElementInterface, MetaDataInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('script', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Script
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Script($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Script
    {
        return new Script($this->attributes, $this->children->add($element));
    }

    public function withAsync(): Script
    {
        return $this->withAttribute('async');
    }

    /**
     * @param string $meta
     * @return Script
     * @see https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
     */
    public function withIntegrity(string $meta): Script
    {
        return $this->withAttribute('integrity', $meta);
    }

    public function withSrc(string $url): Script
    {
        return $this->withAttribute('src', $url);
    }

    public function withType(string $mime): Script
    {
        return $this->withAttribute('type', $mime);
    }

    public function withText(string $code): Script
    {
        return $this->withAttribute('text', $code);
    }

    public function withDefer(): Script
    {
        return $this->withAttribute('defer');
    }

    /**
     * @param string $policy
     * @return Script
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_settings_attributes
     */
    public function withCrossOrigin(string $policy): Script
    {
        return $this->withAttribute('crossorigin', $policy);
    }

    public function isPhrasing(): bool
    {
        return false;
    }
}
