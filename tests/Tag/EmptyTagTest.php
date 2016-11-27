<?php

namespace Tag;

use RoyallTheFourth\HtmlDocument\Tag\EmptyTag;

final class EmptyTagTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderNoAttributes()
    {
        $this->assertContains('<test>', (new EmptyTag('test'))->render());
    }
}
