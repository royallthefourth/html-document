<?php

namespace RoyallTheFourth\HtmlDocument\Test\Set;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;

final class AttributeSetTest extends \PHPUnit_Framework_TestCase
{
    public function testAddAndIterate()
    {
        $set = new AttributeSet();
        $set->add(new StandardAttribute('class', 'active'));
        $set->add(new BooleanAttribute('required'));

        $gen = $set->iterate();

        static::assertEquals('class="active"', $gen->current()->render());
        $gen->next();
        static::assertEquals('required', $gen->current()->render());
    }

    public function testMerge()
    {
        $set1 = new AttributeSet(new StandardAttribute('class', 'active'));
        $set2 = new AttributeSet(new BooleanAttribute('required'));

        $set1->merge($set2);

        $gen = $set1->iterate();

        static::assertEquals('class="active"', $gen->current()->render());
        $gen->next();
        static::assertEquals('required', $gen->current()->render());
    }
}
