<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

/**
 * Class Base
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
final class Base extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<base{$attributes}>\n";
    }

    public function withAttribute(string $name, string $value = null): Base
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Base($this->attributes->add($attribute));
    }

    /**
     * Does nothing.
     * @param ElementInterface $element
     * @return Base
     */
    public function withChild(ElementInterface $element): Base
    {
        return $this;
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
