<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\RuleInterface;
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

    abstract public function withAttribute(string $key, string $value = null);

    public function validate(RuleInterface $rule = null)
    {
        if ($rule !== null) {
            $this->children->validate($rule);
            $this->attributes->validate($rule);
        }
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
     */
    final public function withAccessKey(string $key)
    {
        return $this->withAttribute('accesskey', $key);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
     */
    final public function withClass(string $class)
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
    final public function withContextMenu(string $id)
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
    final public function withHidden()
    {
        return $this->withAttribute('hidden');
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
     */
    final public function withId(string $id)
    {
        return $this->withAttribute('id', $id);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
     */
    final public function withLang(string $lang)
    {
        return $this->withAttribute('lang', $lang);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style
     */
    final public function withStyle(string $css)
    {
        return $this->withAttribute('style', $css);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/tabindex
     */
    final public function withTabIndex(int $tabIndex)
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
