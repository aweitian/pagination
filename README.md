# pagination
```
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
```
