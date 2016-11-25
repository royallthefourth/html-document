<?php

namespace RoyallTheFourth\HtmlDocument\Element\Valid;

use RoyallTheFourth\HtmlDocument\Element\Valid\Hierarchy\HeadChildInterface;

/**
 * Class Base
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
final class Base extends AbstractElement implements HeadChildInterface
{
    public function __construct()
    {
        $this->validAttributes = [
            'href',
            'target'
        ];
        $this->element = new \RoyallTheFourth\HtmlDocument\Element\Base();
    }

    public function withHref($href): Base
    {
        return $this->withAttribute('href', $href);
    }

    public function withTarget($target): Base
    {
        return $this->withAttribute('target', $target);
    }
}
