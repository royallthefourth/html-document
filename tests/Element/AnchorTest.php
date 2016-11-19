<?php

namespace RoyallTheFourth\HtmlDocument\Test\Element;

use RoyallTheFourth\HtmlDocument\Element\Anchor;
use RoyallTheFourth\HtmlDocument\Element\Text;

final class AnchorTest extends \PHPUnit_Framework_TestCase
{
    public function testAnchor()
    {
        static::assertEquals(
            "<a href=\"https://example.com\">\nexample\n</a>\n",
            (new Anchor())
                ->withHref('https://example.com')
                ->withChild(new Text('example'))
                ->render()
        );
    }
}
