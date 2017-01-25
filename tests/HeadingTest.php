<?php

namespace RoyallTheFourth\HtmlDocument\Test\Element;

use RoyallTheFourth\HtmlDocument\Element\Heading;
use RoyallTheFourth\HtmlDocument\Element\Text;

final class HeadingTest extends \PHPUnit_Framework_TestCase
{
    public function testAnchor()
    {
        static::assertEquals(
            "<h2>\nexample\n</h2>\n",
            (new Heading(2))
                ->withChild(new Text('example'))
                ->render()
        );
    }
}
