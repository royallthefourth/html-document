<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

/**
 * Class Input
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 */
final class Input extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->tag = new EmptyTag('input', $attributes);
    }

    public function withAttribute(string $name, string $value = null): Input
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Input($this->attributes->add($attribute));
    }

    public function withType(string $type): Input
    {
        return $this->withAttribute('type', $type);
    }

    public function withAccept(string $fileTypes): Input
    {
        return $this->withAttribute('accept', $fileTypes);
    }

    public function withAutoComplete(string $mode = 'on'): Input
    {
        return $this->withAttribute('autocomplete', $mode);
    }

    public function withAutoFocus(): Input
    {
        return $this->withAttribute('autofocus');
    }

    public function withCapture(string $capture): Input
    {
        return $this->withAttribute('capture', $capture);
    }

    public function withChecked(): Input
    {
        return $this->withAttribute('checked');
    }

    public function withDisabled(): Input
    {
        return $this->withAttribute('disabled');
    }

    public function withForm(string $id): Input
    {
        return $this->withAttribute('form', $id);
    }

    public function withFormAction(string $url): Input
    {
        return $this->withAttribute('formaction', $url);
    }

    public function withFormEncType(string $encoding = 'application/x-www-form-urlencoded'): Input
    {
        return $this->withAttribute('formenctype', $encoding);
    }

    public function withFormMethod(string $method): Input
    {
        return $this->withAttribute('formmethod', $method);
    }

    public function withFormNoValidate(): Input
    {
        return $this->withAttribute('formnovalidate');
    }

    public function withFormTarget(string $target = '_self'): Input
    {
        return $this->withAttribute('formtarget', $target);
    }

    public function withHeight(int $pixels): Input
    {
        return $this->withAttribute('height', $pixels);
    }

    public function withInputMode(string $mode): Input
    {
        return $this->withAttribute('inputmode', $mode);
    }

    public function withList(string $dataListId): Input
    {
        return $this->withAttribute('list', $dataListId);
    }

    public function withMax(string $max): Input
    {
        return $this->withAttribute('max', $max);
    }

    public function withMaxLength(string $max): Input
    {
        return $this->withAttribute('maxlength', $max);
    }

    public function withMin(string $min): Input
    {
        return $this->withAttribute('min', $min);
    }

    public function withMinLength(string $min): Input
    {
        return $this->withAttribute('minlength', $min);
    }

    public function withMultiple(): Input
    {
        return $this->withAttribute('multiple');
    }

    public function withName(string $name): Input
    {
        return $this->withAttribute('name', $name);
    }

    public function withPattern(string $regex): Input
    {
        return $this->withAttribute('pattern', $regex);
    }

    public function withPlaceholder(string $placeholder): Input
    {
        return $this->withAttribute('placeholder', $placeholder);
    }

    public function withReadOnly(): Input
    {
        return $this->withAttribute('readonly');
    }

    public function withRequired(): Input
    {
        return $this->withAttribute('required');
    }

    public function withSelectionDirection(string $direction = 'forward'): Input
    {
        return $this->withAttribute('selectionDirection', $direction);
    }

    public function withSelectionEnd(string $end): Input
    {
        return $this->withAttribute('selectionEnd', $end);
    }

    public function withSelectionStart(string $start): Input
    {
        return $this->withAttribute('selectionStart', $start);
    }

    public function withSize(int $size): Input
    {
        return $this->withAttribute('size', $size);
    }

    public function withSpellCheck(string $check = 'default'): Input
    {
        return $this->withAttribute('spellcheck', $check);
    }

    public function withSrc(string $url): Input
    {
        return $this->withAttribute('src', $url);
    }

    public function withStep(string $increment): Input
    {
        return $this->withAttribute('step', $increment);
    }

    public function withValue(string $value): Input
    {
        return $this->withAttribute('value', $value);
    }

    public function withWidth(int $width): Input
    {
        return $this->withAttribute('width', $width);
    }
}
