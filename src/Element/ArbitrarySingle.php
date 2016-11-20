<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

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
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();

        return "<{$this->name}{$attributes}>\n";
    }

    public function withAttribute(string $name, string $value = null): ArbitrarySingle
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new ArbitrarySingle($this->name, $this->attributes->add($attribute));
    }

    /**
     * Does nothing
     * @param ElementInterface $element
     * @return ArbitrarySingle
     */
    public function withChild(ElementInterface $element): ArbitrarySingle
    {
        return $this;
    }
}