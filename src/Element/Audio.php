<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class Audio
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio
 */
final class Audio extends AbstractElement
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

        return "<audio{$attributes}>{$children}\n</audio>\n";
    }

    public function withAttribute(string $name, string $value = null): Audio
    {
        if($value) {
            $attribute = new StandardAttribute($name, $value);
        }else{
            $attribute = new BooleanAttribute($name);
        }

        return new Audio($this->attributes->add($attribute));
    }

    public function withChild(ElementInterface $element): Audio
    {
        return new Audio($this->attributes, $this->children->add($element));
    }

    public function withAutoplay(): Audio
    {
        return $this->withAttribute('autoplay');
    }

    public function withControls(): Audio
    {
        return $this->withAttribute('controls');
    }

    public function withLoop(): Audio
    {
        return $this->withAttribute('loop');
    }

    public function withMuted(): Audio
    {
        return $this->withAttribute('muted');
    }

    public function withPreload(string $preload = 'metadata'): Audio
    {
        return $this->withAttribute('preload', $preload);
    }

    public function withSrc(string $src): Audio
    {
        return $this->withAttribute('src', $src);
    }

    public function withVolume(string $volume): Audio
    {
        return $this->withAttribute('volume', $volume);
    }
}