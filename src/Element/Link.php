<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Link
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
final class Link extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('link', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Link
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Link($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Link
    {
        return new Link($this->attributes, $this->children->add($element));
    }

    public function withCrossOrigin(string $policy): Link
    {
        return $this->withAttribute('crossorigin', $policy);
    }

    public function withHref(string $url): Link
    {
        return $this->withAttribute('href', $url);
    }

    public function withHrefLang(string $language): Link
    {
        return $this->withAttribute('hreflang', $language);
    }

    /**
     * @param string $mediaQuery
     * @return Link
     * @see https://developer.mozilla.org/en-US/docs/Web/CSS/Media_Queries/Using_media_queries
     */
    public function withMedia(string $mediaQuery): Link
    {
        return $this->withAttribute('media', $mediaQuery);
    }

    /**
     * @param string $linkType
     * @return Link
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types
     */
    public function withRel(string $linkType): Link
    {
        return $this->withAttribute('rel', $linkType);
    }

    public function withSizes(string $sizes = 'any'): Link
    {
        return $this->withAttribute('sizes', $sizes);
    }

    public function withType(string $mime): Link
    {
        return $this->withAttribute('type', $mime);
    }
}
