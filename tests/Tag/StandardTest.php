<?php

namespace Tag;

use RoyallTheFourth\HtmlDocument\Tag\Standard;

final class StandardTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderNoAttributesNoChildren()
    {
        $this->assertContains('<test>', (new Standard('test'))->render());
    }
}
