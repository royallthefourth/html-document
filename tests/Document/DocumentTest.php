<?php

namespace Document;

use RoyallTheFourth\HtmlDocument\Document;
use RoyallTheFourth\HtmlDocument\Element\Text;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

final class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testRender()
    {
        $set = new ElementSet();
        $set->add(new Text('test string 1'));
        $set->add(new Text('test string 2'));

        static::assertEquals("test string 1\ntest string 2\n", (new Document($set))->render());
    }

    public function testAdd()
    {
        static::assertEquals("test string 1\ntest string 2\n",
            (new Document())
                ->add(new Text('test string 1'))
                ->add(new Text('test string 2'))
            ->render()
        );
    }
}
