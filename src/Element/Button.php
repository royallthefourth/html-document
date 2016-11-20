<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Button
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button
 */
final class Button extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<button{$attributes}>{$children}\n</button>\n";
    }

    public function withAttribute(string $name, string $value = null): Button
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Button($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Button
    {
        return new Button($this->attributes, $this->children->add($element));
    }

    public function withAutofocus($autofocus): Button
    {
        return $this->withAttribute('autofocus', $autofocus);
    }

    public function withDisabled(): Button
    {
        return $this->withAttribute('disabled');
    }

    public function withForm($formId): Button
    {
        return $this->withAttribute('form', $formId);
    }

    public function withFormAction($url): Button
    {
        return $this->withAttribute('formaction', $url);
    }

    public function withFormEncType($encoding): Button
    {
        return $this->withAttribute('formenctype', $encoding);
    }

    public function withFormNoValidate(): Button
    {
        return $this->withAttribute('formnovalidate');
    }

    public function withFormTarget($target): Button
    {
        return $this->withAttribute('formtarget', $target);
    }

    public function withName($name): Button
    {
        return $this->withAttribute('name', $name);
    }

    public function withType($type): Button
    {
        return $this->withAttribute('type', $type);
    }

    public function withValue($value): Button
    {
        return $this->withAttribute('value', $value);
    }
}
