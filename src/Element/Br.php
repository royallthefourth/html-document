<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\Single;

/**
 * Class Br
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br
 */
final class Br extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new Single('br', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Br
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Br($this->attributes->add($attribute));
    }
}
