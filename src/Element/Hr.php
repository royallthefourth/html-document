<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Hr
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/hr
 */
final class Hr extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<hr{$attributes}>\n";
    }

    public function withAttribute(string $name, string $value = null): Hr
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Hr($this->attributes->add($attribute));
    }

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @throws \ErrorException
     */
    public function withChild(ElementInterface $element)
    {
        throw new \ErrorException('Element does not allow children.');
    }
}
