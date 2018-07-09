<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 16:55
 */

namespace Aw;

class EllipsisPagination
{
    protected $totalLen;
    protected $curPageNum;
    protected $pageSize;
    protected $pageBtnLen;

    protected $data;

    public function __construct($totalLen, $curPageNum, $pageSize, $pageBtnLen = 5)
    {
        if (is_numeric($totalLen) && is_numeric($curPageNum) && is_numeric($pageSize) && is_numeric($pageBtnLen)) {
            $this->totalLen = $totalLen;
            $this->curPageNum = $curPageNum;
            $this->pageSize = $pageSize;
            $this->pageBtnLen = $pageBtnLen;
            if ($this->curPageNum < 1) {
                $this->curPageNum = 1;
            }
            if ($this->pageBtnLen < 5) {
                $this->pageBtnLen = 5;
            }
            $this->init();
        } else {
            return;
        }
    }

    protected function init()
    {
        $this->data = array();
        $total = intval(ceil($this->totalLen / $this->pageSize));
        $btn_num = $this->pageBtnLen;
        $cur = $this->curPageNum;
        if ($cur > $total) {
            $cur = $total; // page 和 page比较
        }
        $hasPre = false;
        $hasRear = false;
        //这个3是第一个1,当前,最后三个按钮,这三个按钮肯定要是出现的
        if ($total > $btn_num) {
//            var_dump('xxxxxxxxxxxxxxx');
            if ($cur < $btn_num) {
                $hasRear = true;
            } else if ($cur > $total - ($btn_num - 1)) {
                $hasPre = true;
            } else {
                $hasRear = true;
                $hasPre = true;
            }
        }


//        var_dump($hasPre, $hasRear);


        if (!$hasPre && !$hasRear) {
//            var_export('111111111111111');
            $start = null;
            $rear = null;
        } else if ($hasPre && !$hasRear) {
//            var_export('222222222222222');

            $start = $total - $btn_num + 2;//$total - ($btn_num - 2);
            $rear = $total - 1;
        } else if ($hasRear && !$hasPre) {
//            var_export('333333333333333');

            $start = 2;
            $rear = $btn_num - 1;//1 + $btn_num - 2;
        } else {
//            var_export('444444444444444444');

            $start = $cur  - intval(floor(($btn_num - 3) / 2));
            $rear = $cur + intval(ceil(($btn_num - 3) / 2));
            var_dump($start, $rear);
            if ($start < 2) {
                $hasPre = false;
                $start = 2;
                $rear = $start + $btn_num - 3;
            } else if ($rear >= $total - 1) {
                $hasRear = false;
                $start = $rear - $btn_num + 1;
                $rear = $start + $btn_num - 3;
            }
        }
        $this->data['hasPre'] = $hasPre;
        $this->data['hasRear'] = $hasRear;
        $this->data['start'] = $start;
        $this->data['rear'] = $rear;
        $this->data['cur'] = $cur;
        $this->data['total'] = $total;
    }

    public function hasEllipsis()
    {
        return $this->hasPreEllipsis() || $this->hasRearEllipsis();
    }


    /**
     * @return int
     */
    public function getTotalRowNum()
    {
        return $this->totalLen;
    }

    /**
     * @return bool
     */
    public function hasPreEllipsis()
    {
        return $this->data['hasPre'];
    }

    /**
     * @return bool
     */
    public function hasRearEllipsis()
    {
        return $this->data['hasRear'];
    }

    /**
     * 获取第二个页码, 第一个页面永远是1
     * @return int
     */
    public function getStartNum()
    {
        return $this->data['start'];
    }

    /**
     * 获取倒数第二个页码, 最后一个页面永远是total
     * @return int
     */
    public function getRearNum()
    {
        return $this->data['rear'];
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->data['total'];
    }

    /**
     * @return int
     */
    public function getCurrent()
    {
        return $this->data['cur'];
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }
}