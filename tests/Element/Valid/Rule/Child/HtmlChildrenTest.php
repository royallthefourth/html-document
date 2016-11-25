<?php

namespace RoyallTheFourth\HtmlDocument\Test\Element\Valid\Rule\Child;

use RoyallTheFourth\HtmlDocument\Element\Body;
use RoyallTheFourth\HtmlDocument\Element\Head;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\Child\HtmlChildren;

final class HtmlChildrenTest extends \PHPUnit_Framework_TestCase
{
    public function testNoChildren()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must have children');
        (new HtmlChildren())->validate();
    }

    public function testWrongFirstType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must be head');
        (new HtmlChildren([0]))->validate();
    }

    public function testWrongSecondType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must be body');
        (new HtmlChildren([new Head(), 0]))->validate();
    }

    public function testTooMany()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('more than two');
        (new HtmlChildren([new Head(), new Body(), 0]))->validate();
    }
}
