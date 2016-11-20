<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\Single;

/**
 * Class Arbitrary
 * Any type of tag without a matching close tag.
 */
final class ArbitrarySingle extends AbstractElement
{
    private $name;

    public function __construct(string $name, AttributeSet $attributes = null)
    {
        $this->name = $name;
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new Single($name, $attributes);
    }

    public function withAttribute(string $name, string $value = null): ArbitrarySingle
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new ArbitrarySingle($this->name, $this->attributes->add($attribute));
    }
}
