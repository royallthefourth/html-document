<?php

namespace RoyallTheFourth\HtmlDocument\Test\Element\Valid\Rule\Child;

use RoyallTheFourth\HtmlDocument\Element\Valid\Body;
use RoyallTheFourth\HtmlDocument\Element\Valid\Head;
use RoyallTheFourth\HtmlDocument\Element\Valid\Rule\HtmlRule;

final class HtmlRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testNoChildren()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must have children');
        (new HtmlRule())->validate();
    }

    public function testWrongFirstType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must be head');
        (new HtmlRule([0]))->validate();
    }

    public function testWrongSecondType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('must be body');
        (new HtmlRule([new Head(), 0]))->validate();
    }

    public function testTooMany()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('more than two');
        (new HtmlRule([new Head(), new Body(), 0]))->validate();
    }
}
