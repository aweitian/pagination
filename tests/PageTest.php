<?php

use Aw\Pagination;

class PageTest extends PHPUnit_Framework_TestCase
{
    public function testCommand1()
    {
        $page = new Pagination(50, 1, 10, 5);
        $this->assertEquals(1, $page->getCurPageNum());
        $this->assertEquals(5, $page->getMaxPage());
        $this->assertEquals(10, $page->getPageSize());
        $this->assertEquals(5, $page->getPageBtnLen());
        $this->assertEquals(1, $page->getStartPage());
        $this->assertFalse($page->hasPre());
        $this->assertTrue($page->hasNext());
    }

    public function testCommand2()
    {
        $page = new Pagination(16, 3, 7, 3);
        $this->assertEquals(3, $page->getCurPageNum());
        $this->assertEquals(3, $page->getMaxPage());
        $this->assertEquals(7, $page->getPageSize());
        $this->assertEquals(3, $page->getPageBtnLen());
        $this->assertEquals(1, $page->getStartPage());
        $this->assertTrue($page->hasPre());
        $this->assertFalse($page->hasNext());
    }

    public function testCommand3()
    {
        $page = new Pagination(2, 2, 7, 3);
        $this->assertEquals(1, $page->getCurPageNum());
        $this->assertEquals(1, $page->getMaxPage());
        $this->assertEquals(7, $page->getPageSize());
        $this->assertEquals(1, $page->getPageBtnLen());
        $this->assertEquals(1, $page->getStartPage());
        $this->assertFalse($page->hasPre());
        $this->assertFalse($page->hasNext());
    }

    public function testCommand4()
    {
        $page = new Pagination(12, 2, 7, 5);
        $this->assertEquals(2, $page->getCurPageNum());
        $this->assertEquals(2, $page->getMaxPage());
        $this->assertEquals(7, $page->getPageSize());
        $this->assertEquals(2, $page->getPageBtnLen());
        $this->assertEquals(1, $page->getStartPage());
        $this->assertTrue($page->hasPre());
        $this->assertFalse($page->hasNext());
    }

    public function testCommand5()
    {
        $page = new Pagination(1, 2, 7, 5);
        $this->assertEquals(1, $page->getCurPageNum());
        $this->assertEquals(1, $page->getMaxPage());
        $this->assertEquals(7, $page->getPageSize());
        $this->assertEquals(1, $page->getPageBtnLen());
        $this->assertEquals(1, $page->getStartPage());
        $this->assertFalse($page->hasPre());
        $this->assertFalse($page->hasNext());
    }

    public function testWrite()
    {
        print "\n";
        $page = new Pagination(110, 2, 7, 5);

        print "total:   {$page->getCurPageNum()} / {$page->getMaxPage()}   ";

        if ($page->hasPre()) {
            print "[{$page->getPre()} <<] ";
        }

        for ($i = 0; $i < $page->getPageBtnLen(); $i++) {
            $num = $page->getStartPage() + $i;
            if ($num == $page->getCurPageNum()) {
                print "{$num} ";
            } else {
                print "[{$num}] ";
            }

        }


        if ($page->hasNext()) {
            print "[>>{$page->getNext()}]";
        }
    }

    public function testInc()
    {
        print "\n";
        $page = new Pagination(110, 2, 7, 5);
        include __DIR__."/tpl.php";
    }
}

