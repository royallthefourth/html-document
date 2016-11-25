<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\ElementInterface;

/**
 * Class AbstractElement
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes
 */
abstract class AbstractElement implements ValidElementInterface
{
    protected $validAttributes;

    private static $globalAttributes = [
        'onabort',
        'onautocomplete',
        'onautocompleteerror',
        'onblur',
        'oncancel',
        'oncanplay',
        'oncanplaythrough',
        'onchange',
        'onclick',
        'onclose',
        'oncontextmenu',
        'oncuechange',
        'ondblclick',
        'ondrag',
        'ondragend',
        'ondragenter',
        'ondragexit',
        'ondragleave',
        'ondragover',
        'ondragstart',
        'ondrop',
        'ondurationchange',
        'onemptied',
        'onended',
        'onerror',
        'onfocus',
        'oninput',
        'oninvalid',
        'onkeydown',
        'onkeypress',
        'onkeyup',
        'onload',
        'onloadeddata',
        'onloadedmetadata',
        'onloadstart',
        'onmousedown',
        'onmouseenter',
        'onmouseleave',
        'onmousemove',
        'onmouseout',
        'onmouseover',
        'onmouseup',
        'onmousewheel',
        'onpause',
        'onplay',
        'onplaying',
        'onprogress',
        'onratechange',
        'onreset',
        'onresize',
        'onscroll',
        'onseeked',
        'onseeking',
        'onselect',
        'onshow',
        'onsort',
        'onstalled',
        'onsubmit',
        'onsuspend',
        'ontimeupdate',
        'ontoggle',
        'onvolumechange',
        'onwaiting',
        'accesskey',
        'class',
        'contenteditable',
        'contextmenu',
        'dir',
        'draggable',
        'dropzone',
        'hidden',
        'id',
        'itemid',
        'itemprop',
        'itemref',
        'itemscope',
        'itemtype',
        'lang',
        'slot',
        'spellcheck',
        'style',
        'tabindex',
        'title',
        'translate'
    ];

    private static $globalAttributePrefixes = [
        'aria',
        'data'
    ];

    /** @var  $tag ElementInterface */
    protected $element;

    final public function render(): string
    {
        return $this->element->render();
    }

    /**
     * @param string $attribute
     * @throws \Exception
     */
    protected function verifyAttribute(string $attribute)
    {
        $prefix = explode('-', $attribute)[0];
        if (!(
                in_array($prefix, static::$globalAttributePrefixes, true)
                || in_array($attribute, array_merge($this->validAttributes, static::$globalAttributes), true)
            )) {
            throw new \Exception("Attribute type {$attribute} is not valid for " . get_class($this));
        }
    }

    /**
     * @param string $name
     * @param string|null $value
     * @return $this
     * @throws \Exception
     */
    public function withAttribute(string $name, string $value = null)
    {
        try {
            $this->verifyAttribute($name);
        } catch (\Exception $e) {
            throw new \Exception("Could not add attribute {$name}", 0, $e);
        }

        $this->element = $this->element->withAttribute($name, $value);
        return $this;
    }

    public function isPhrasing(): bool
    {
        return false;
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
     * @throws \Exception
     */
    public function withContentEditable(string $contentEditable)
    {
        if (!in_array($contentEditable, ['true', 'false'], true)) {
            throw new \Exception('Invalid value set on contenteditable attribute');
        }

        return $this->withAttribute('contenteditable', $contentEditable);
    }
    
    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
     * @throws \Exception
     */
    public function withDir(string $dir)
    {
        if (!in_array($dir, ['ltr', 'rtl', 'auto'], true)) {
            throw new \Exception('Invalid value set on dir attribute');
        }

        return $this->withAttribute('dir', $dir);
    }
    
    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/draggable
     * @throws \Exception
     */
    public function withDraggable(string $draggable)
    {
        if (!in_array($draggable, ['true', 'false'], true)) {
            throw new \Exception('Invalid value set on draggable attribute');
        }

        return $this->withAttribute('draggable', $draggable);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dropzone
     * @throws \Exception
     */
    public function withDropZone(string $dropZone)
    {
        if (!in_array($dropZone, ['copy', 'move', 'link'], true)) {
            throw new \Exception('Invalid value set on dropzone attribute');
        }
        return $this->withAttribute('dropzone', $dropZone);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemid
     */
    public function withItemId(string $itemId)
    {
        return $this->withAttribute('itemid', $itemId);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemprop
     */
    public function withItemProp(string $itemProp)
    {
        return $this->withAttribute('itemprop', $itemProp);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemref
     */
    public function withItemRef(string $itemRef)
    {
        return $this->withAttribute('itemref', $itemRef);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemscope
     */
    public function withItemScope(string $itemScope)
    {
        return $this->withAttribute('itemscope', $itemScope);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/itemtype
     */
    public function withItemType(string $itemType)
    {
        return $this->withAttribute('itemtype', $itemType);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/API/Element/slot
     */
    public function withSlot(string $slot)
    {
        return $this->withAttribute('slot', $slot);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/spellcheck
     * @throws \Exception
     */
    public function withSpellcheck(string $spellcheck)
    {
        if (!in_array($spellcheck, ['true', 'false'], true)) {
            throw new \Exception('Invalid value set on spellcheck attribute');
        }

        return $this->withAttribute('spellcheck', $spellcheck);
    }

    /**
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
     * @throws \Exception
     */
    public function withTranslate(string $translate = 'yes')
    {
        if (!in_array($translate, ['', 'yes', 'no'], true)) {
            throw new \Exception('Invalid value set on translate attribute');
        }

        return $this->withAttribute('translate', $translate);
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
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contextmenu
     */
    final public function withContextMenu(string $id)
    {
        return $this->withAttribute('contextmenu', $id);
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
}
