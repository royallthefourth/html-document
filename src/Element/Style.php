<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Style
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style
 */
final class Style extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('style', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Style
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Style($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Style
    {
        return new Style($this->attributes, $this->children->add($element));
    }

    public function withType(string $mime = 'text/css'): Style
    {
        return $this->withAttribute('type', $mime);
    }

    /**
     * @param string $query
     * @return Style
     * @see https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Media_queries
     */
    public function withMedia(string $query = 'all'): Style
    {
        return $this->withAttribute('media', $query);
    }
}
