<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Column
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/col
 */
final class Column extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<col{$attributes}>\n";
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

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return Column
     */
    public function withChild(ElementInterface $element): Column
    {
        return $this;
    }

    public function withSpan(int $span = 1): Column
    {
        return $this->withAttribute('span', $span);
    }
}
