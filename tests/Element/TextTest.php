<?php

namespace RoyallTheFourth\HtmlDocument\Test\Element;

use RoyallTheFourth\HtmlDocument\Element\Text;

final class TextTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Text */
    private $text;

    protected function setUp()
    {
        $this->text = new Text('just a test');
    }

    public function testBasicText()
    {
        static::assertEquals('just a test', $this->text->render());
    }
}
