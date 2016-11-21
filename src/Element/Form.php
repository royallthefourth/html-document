<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Form
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form
 */
final class Form extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('form', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Form
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Form($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Form
    {
        return new Form($this->attributes, $this->children->add($element));
    }

    public function withAcceptCharset(string $charset = 'UNKNOWN'): Form
    {
        return $this->withAttribute('accept-charset', $charset);
    }

    public function withAction(string $url): Form
    {
        return $this->withAttribute('action', $url);
    }

    public function withAutoComplete(string $autoComplete = 'On'): Form
    {
        return $this->withAttribute('autocomplete', $autoComplete);
    }

    public function withEncType(string $encType = 'application/x-www-form-urlencoded'):Form
    {
        return $this->withAttribute('enctype', $encType);
    }

    public function withMethod(string $method = 'get'): Form
    {
        return $this->withAttribute('method', $method);
    }

    public function withName(string $name): Form
    {
        return $this->withAttribute('name', $name);
    }

    public function withNoValidate(): Form
    {
        return $this->withAttribute('novalidate');
    }

    public function withTarget(string $target = '_self'): Form
    {
        return $this->withAttribute('target', $target);
    }
}
