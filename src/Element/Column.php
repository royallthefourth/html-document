<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\Single;

/**
 * Class Column
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/col
 */
final class Column extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new Single('col', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Column
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Column($this->attributes->add($attribute));
    }

    public function withSpan(int $span = 1): Column
    {
        return $this->withAttribute('span', $span);
    }
}
