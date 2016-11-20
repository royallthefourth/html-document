<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Br
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/br
 */
final class Br extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<br{$attributes}>\n";
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

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return Br
     */
    public function withChild(ElementInterface $element): Br
    {
        return $this;
    }
}
