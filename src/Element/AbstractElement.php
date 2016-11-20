<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\AbstractTag;

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
    /** @var  $tag AbstractTag */
    protected $tag;

    final public function render(): string
    {
        return $this->tag->render();
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
     */
    public function withAccessKey(string $key)
    {
        return $this->withAttribute('accesskey', $key);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
     */
    public function withClass(string $class)
    {
        return $this->withAttribute('class', $class);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
     */
    public function withContentEditable(string $editable = 'true')
    {
        return $this->withAttribute('contenteditable', $editable);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contextmenu
     */
    public function withContextMenu(string $id)
    {
        return $this->withAttribute('contextmenu', $id);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
     */
    public function withDir(string $direction = 'auto')
    {
        return $this->withAttribute('dir', $direction);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
     */
    public function withHidden()
    {
        return $this->withAttribute('hidden');
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
     */
    public function withId(string $id)
    {
        return $this->withAttribute('id', $id);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
     */
    public function withLang(string $lang)
    {
        return $this->withAttribute('lang', $lang);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style
     */
    public function withStyle(string $css)
    {
        return $this->withAttribute('style', $css);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
     */
    public function withTabIndex(int $tabIndex)
    {
        return $this->withAttribute('tabindex', $tabIndex);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
     */
    public function withTitle(string $title)
    {
        return $this->withAttribute('title', $title);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
     */
    public function withTranslate(string $translate = 'yes')
    {
        return $this->withAttribute('translate', $translate);
    }
}
