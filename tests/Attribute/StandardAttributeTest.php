<?php

namespace Attribute;

use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;

final class StandardAttributeTest extends \PHPUnit_Framework_TestCase
{
    public function testAttribute()
    {
        static::assertEquals('class="example classes"', (new StandardAttribute('class', 'example classes'))->render());
    }
}
