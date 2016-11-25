<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\ChildRuleInterface;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class TextArea
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea
 */
final class TextArea extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('textarea', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): TextArea
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new TextArea($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element, ChildRuleInterface $rule = null): TextArea
    {
        return new TextArea($this->attributes, $this->children->add($element));
    }

    public function withAutoComplete(string $offOn): TextArea
    {
        return $this->withAttribute('autocomplete', $offOn);
    }

    public function withAutoFocus(): TextArea
    {
        return $this->withAttribute('autofocus');
    }

    public function withCols(int $charWidth = 20): TextArea
    {
        return $this->withAttribute('cols', $charWidth);
    }

    public function withDisabled(): TextArea
    {
        return $this->withAttribute('disabled');
    }

    public function withForm(string $id): TextArea
    {
        return $this->withAttribute('form', $id);
    }

    public function withMaxLength(int $max): TextArea
    {
        return $this->withAttribute('maxlength', $max);
    }

    public function withMinLength(int $min): TextArea
    {
        return $this->withAttribute('minlength', $min);
    }

    public function withName(string $name): TextArea
    {
        return $this->withAttribute('name', $name);
    }

    public function withPlaceholder(string $placeholder): TextArea
    {
        return $this->withAttribute('placeholder', $placeholder);
    }

    public function withReadOnly(): TextArea
    {
        return $this->withAttribute('readonly');
    }

    public function withRequired(): TextArea
    {
        return $this->withAttribute('required');
    }

    public function withRows(int $rows): TextArea
    {
        return $this->withAttribute('rows', $rows);
    }

    public function withSelectionDirection(string $direction): TextArea
    {
        return $this->withAttribute('selectionDirection', $direction);
    }

    public function withSelectionEnd(int $index): TextArea
    {
        return $this->withAttribute('selectionEnd', $index);
    }
    
    public function withSelectionStart(int $index): TextArea
    {
        return $this->withAttribute('selectionStart', $index);
    }

    public function withSpellCheck(string $spellcheck): TextArea
    {
        return $this->withAttribute('spellcheck', $spellcheck);
    }

    public function withWrap(string $wrap = 'soft'): TextArea
    {
        return $this->withAttribute('wrap', $wrap);
    }
}
