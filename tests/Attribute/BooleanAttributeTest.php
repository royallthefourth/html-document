<?php

namespace Attribute;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;

final class BooleanAttributeTest extends \PHPUnit_Framework_TestCase
{
    public function testAttribute()
    {
        static::assertEquals('required', (new BooleanAttribute('required'))->render());
    }
}
