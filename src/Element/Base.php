<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Base
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
final class Base extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('base', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Base
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Base($this->attributes->add($attribute));
    }

    public function withHref($href): Base
    {
        return $this->withAttribute('href', $href);
    }

    public function withTarget($target): Base
    {
        return $this->withAttribute('target', $target);
    }
}
