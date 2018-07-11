<?php
//[1] ... [6] [7] 8 [9] [10] [11] ... [26]

/**
 * 1 2 3 4 5

当总页数小于等于按钮个数时,全部显示

1,2,3,4,...6
1,...3,4,5,6


 */
use Aw\EllipsisPagination;

class EllipsisPageTest extends PHPUnit_Framework_TestCase
{
    public function testNoPreNoRear()
    {
        $page = new EllipsisPagination(2, 1, 10, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(1, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(8, 1, 5, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(2, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(18, 1, 5, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(4, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(21, 1, 5, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(5, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }

    public function testShort()
    {
        $page = new EllipsisPagination(26, 1, 5, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(26, 2, 5, 5);
        $this->assertEquals(2, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(26, 3, 5, 5);
        $this->assertEquals(3, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(26, 4, 5, 5);
        $this->assertEquals(4, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(5, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(26, 5, 5, 5);
        $this->assertEquals(5, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(5, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(26, 6, 5, 5);
        $this->assertEquals(6, $page->getCurrent());
        $this->assertEquals(6, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(5, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }


    public function testLong()
    {
        $page = new EllipsisPagination(126, 1, 5, 5);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 2, 5, 5);
        $this->assertEquals(2, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 3, 5, 5);
        $this->assertEquals(3, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(4, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 4, 5, 5);
        $this->assertEquals(4, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(5, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 5, 5, 5);
        $this->assertEquals(5, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(4, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 6, 5, 5);
        $this->assertEquals(6, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(5, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 22, 5, 5);
        $this->assertEquals(22, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(21, $page->getStartNum());
        $this->assertEquals(23, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 23, 5, 5);
        $this->assertEquals(23, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(22, $page->getStartNum());
        $this->assertEquals(24, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 25, 5, 5);
        $this->assertEquals(25, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(23, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 26, 5, 5);
        $this->assertEquals(26, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(23, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }

    public function testBnt7NoPreNoRear()
    {
        $bnt_len = 7;
        $page = new EllipsisPagination(2, 1, 10, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(1, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(8, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(2, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(18, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(4, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(21, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(5, $page->getTotal());
        $this->assertEquals(null, $page->getStartNum());
        $this->assertEquals(null, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }

    public function testBtn7Short()
    {
        $bnt_len = 7;
        $page = new EllipsisPagination(36, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 2, 5, $bnt_len);
        $this->assertEquals(2, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 3, 5, $bnt_len);
        $this->assertEquals(3, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(36, 4, 5, $bnt_len);
        $this->assertEquals(4, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 5, 5, $bnt_len);
        $this->assertEquals(5, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 6, 5, $bnt_len);
        $this->assertEquals(6, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 7, 5, $bnt_len);
        $this->assertEquals(7, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(36, 8, 5, $bnt_len);
        $this->assertEquals(8, $page->getCurrent());
        $this->assertEquals(8, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }



    public function testBtn7Long()
    {
        $bnt_len = 7;
        $page = new EllipsisPagination(126, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 2, 5, $bnt_len);
        $this->assertEquals(2, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 3, 5, $bnt_len);
        $this->assertEquals(3, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 4, 5, $bnt_len);
        $this->assertEquals(4, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(6, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 5, 5, $bnt_len);
        $this->assertEquals(5, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 6, 5, $bnt_len);
        $this->assertEquals(6, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(4, $page->getStartNum());
        $this->assertEquals(8, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 7, 5, $bnt_len);
        $this->assertEquals(7, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(5, $page->getStartNum());
        $this->assertEquals(9, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 20, 5, $bnt_len);
        $this->assertEquals(20, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(18, $page->getStartNum());
        $this->assertEquals(22, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 21, 5, $bnt_len);
        $this->assertEquals(21, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(19, $page->getStartNum());
        $this->assertEquals(23, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 25, 5, $bnt_len);
        $this->assertEquals(25, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(21, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 26, 5, $bnt_len);
        $this->assertEquals(26, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(21, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }


    public function testBtn8Long()
    {
        $bnt_len = 8;
        $page = new EllipsisPagination(126, 1, 5, $bnt_len);
        $this->assertEquals(1, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 2, 5, $bnt_len);
        $this->assertEquals(2, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 3, 5, $bnt_len);
        $this->assertEquals(3, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 4, 5, $bnt_len);
        $this->assertEquals(4, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(2, $page->getStartNum());
        $this->assertEquals(7, $page->getRearNum());
        $this->assertFalse($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 5, 5, $bnt_len);
        $this->assertEquals(5, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(3, $page->getStartNum());
        $this->assertEquals(8, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 6, 5, $bnt_len);
        $this->assertEquals(6, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(4, $page->getStartNum());
        $this->assertEquals(9, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 7, 5, $bnt_len);
        $this->assertEquals(7, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(5, $page->getStartNum());
        $this->assertEquals(10, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        // [1] ... [6] [7] 8 [9] [10] [11] ... [26]
        $page = new EllipsisPagination(126, 8, 5, $bnt_len);
        $this->assertEquals(8, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(6, $page->getStartNum());
        $this->assertEquals(11, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());


        $page = new EllipsisPagination(126, 19, 5, $bnt_len);
        $this->assertEquals(19, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(17, $page->getStartNum());
        $this->assertEquals(22, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 20, 5, $bnt_len);
        $this->assertEquals(20, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(18, $page->getStartNum());
        $this->assertEquals(23, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 21, 5, $bnt_len);
        $this->assertEquals(21, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(19, $page->getStartNum());
        $this->assertEquals(24, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertTrue($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 25, 5, $bnt_len);
        $this->assertEquals(25, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(20, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());

        $page = new EllipsisPagination(126, 26, 5, $bnt_len);
        $this->assertEquals(26, $page->getCurrent());
        $this->assertEquals(26, $page->getTotal());
        $this->assertEquals(20, $page->getStartNum());
        $this->assertEquals(25, $page->getRearNum());
        $this->assertTrue($page->hasPreEllipsis());
        $this->assertFalse($page->hasRearEllipsis());
    }
}

