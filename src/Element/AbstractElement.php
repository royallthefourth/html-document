<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\TagInterface;

/**
 * Class AbstractElement
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes
 */
abstract class AbstractElement implements ElementInterface
{
    /** @var  $attributes AttributeSet */
    protected $attributes;
    /** @var  $children ElementSet */
    protected $children;
    /** @var  $tag TagInterface */
    protected $tag;

    final public function render(): string
    {
        return $this->tag->render();
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
     */
    public function withAccessKey(string $key): self
    {
        return $this->withAttribute('accesskey', $key);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
     */
    public function withClass(string $class): self
    {
        return $this->withAttribute('class', $class);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
     */
    public function withContentEditable(string $editable = 'true'): self
    {
        return $this->withAttribute('contenteditable', $editable);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contextmenu
     */
    public function withContextMenu(string $id): self
    {
        return $this->withAttribute('contextmenu', $id);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
     */
    public function withDir(string $direction = 'auto'): self
    {
        return $this->withAttribute('dir', $direction);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
     */
    public function withHidden(): self
    {
        return $this->withAttribute('hidden');
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
     */
    public function withId(string $id): self
    {
        return $this->withAttribute('id', $id);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
     */
    public function withLang(string $lang): self
    {
        return $this->withAttribute('lang', $lang);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style
     */
    public function withStyle(string $css): self
    {
        return $this->withAttribute('style', $css);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
     */
    public function withTabIndex(int $tabIndex): self
    {
        return $this->withAttribute('tabindex', $tabIndex);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
     */
    public function withTitle(string $title): self
    {
        return $this->withAttribute('title', $title);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
     */
    public function withTranslate(string $translate = 'yes'): self
    {
        return $this->withAttribute('translate', $translate);
    }
}
