<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\MetaDataInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Meta
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
 */
final class Meta extends AbstractElement implements MetaDataInterface
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('meta', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Meta
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Meta($this->attributes->add($attribute));
    }

    /**
     * @param string $charset
     * @return Meta
     * @see http://www.iana.org/assignments/character-sets
     */
    public function withCharset(string $charset): Meta
    {
        return $this->withAttribute('charset', $charset);
    }

    public function withContent(string $content): Meta
    {
        return $this->withAttribute('content', $content);
    }

    public function withHttpEquiv(string $httpEquiv): Meta
    {
        return $this->withAttribute('http-equiv', $httpEquiv);
    }

    /**
     * @param string $name
     * @return Meta
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta#attr-name
     */
    public function withName(string $name): Meta
    {
        return $this->withAttribute('name', $name);
    }

    public function isPhrasing(): bool
    {
        return false;
    }
}
