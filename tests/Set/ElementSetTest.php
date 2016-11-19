<?php

namespace Set;

use RoyallTheFourth\HtmlDocument\Element\Text;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class ElementSetTest extends \PHPUnit_Framework_TestCase
{
    public function testAddAndIterate()
    {
        $set = new ElementSet();
        $set->add(new Text('test string 1'));
        $set->add(new Text('test string 2'));

        $gen = $set->iterate();

        static::assertEquals('test string 1', $gen->current()->render());
        $gen->next();
        static::assertEquals('test string 2', $gen->current()->render());
    }

    public function testMerge()
    {
        $set1 = new ElementSet(new Text('test string 1'));
        $set2 = new ElementSet(new Text('test string 2'));

        $set1->merge($set2);

        $gen = $set1->iterate();

        static::assertEquals('test string 1', $gen->current()->render());
        $gen->next();
        static::assertEquals('test string 2', $gen->current()->render());
    }
}
