<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Video
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
 */
final class Video extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('video', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Video
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Video($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Video
    {
        return new Video($this->attributes, $this->children->add($element));
    }

    public function withControls(): Video
    {
        return $this->withAttribute('controls');
    }

    /**
     * @param string $policy
     * @return Video
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_settings_attributes
     */
    public function withCrossOrigin(string $policy): Video
    {
        return $this->withAttribute('crossorigin', $policy);
    }

    public function withHeight($height): Video
    {
        return $this->withAttribute('height', $height);
    }

    public function withWidth($width): Video
    {
        return $this->withAttribute('width', $width);
    }

    public function withLoop(): Video
    {
        return $this->withAttribute('loop');
    }

    public function withMuted(): Video
    {
        return $this->withAttribute('muted');
    }

    public function withPreload(string $preload): Video
    {
        return $this->withAttribute('preload', $preload);
    }

    public function withPoster(string $url): Video
    {
        return $this->withAttribute('poster', $url);
    }

    public function withSrc(string $url): Video
    {
        return $this->withAttribute('src', $url);
    }
}
