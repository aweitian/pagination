# pagination
```
$page = new Pagination(110, 2, 7, 5);

<?php print "total:   {$page->getCurPageNum()} / {$page->getMaxPage()}   ";?>

<?php if ($page->hasPre()):?> 
    <a class="pre" href='?page=<?php print $page->getPre()?>'>
        << <?php print $page->getPre()?>
    </a>
<?php endif;?>

<?php for ($i = 0; $i < $page->getPageBtnLen(); $i++) :?>
    <a href='?page=<?php print $page->getStartPage() + $i?>' class='<?php if($page->getStartPage() + $i == $page->getCurPageNum()):?>current<?php endif?>'>
        <?php print $page->getStartPage() + $i?>
    </a>
<?php endfor;?>


<?php if ($page->hasNext()):?> 
    <a class="next" href='?page=<?php print $page->getNext()?>'>
        >> <?php print $page->getNext()?>
    </a>
<?php endif;?>
```

# ellipsis
```
<?php if ($page->hasEllipsis()): ?>
    <?php $i = 1; ?>
    <a<?php if ($i == $page->getCurrent()): ?> class="current"<?php endif ?> href="?<?php $tmp_get = $_GET;
    $tmp_get['page'] = $i;
    print http_build_query($tmp_get) ?>">
        <?php print $i ?>
    </a>
    <?php if ($page->hasPreEllipsis()): ?>
        <a>...</a>
    <?php endif ?>
    <?php for ($i = $page->getStartNum(); $i <= $page->getRearNum(); $i++): ?>
        <a<?php if ($i == $page->getCurrent()): ?> class="current"<?php endif ?> href="?<?php $tmp_get = $_GET;
        $tmp_get['page'] = $i;
        print http_build_query($tmp_get) ?>">
            <?php print $i ?>
        </a>
    <?php endfor ?>
    <?php if ($page->hasRearEllipsis()): ?>
        <a>...</a>
    <?php endif ?>
    <?php $i = $page->getTotal(); ?>
    <a<?php if ($i == $page->getCurrent()): ?> class="current"<?php endif ?> href="?<?php $tmp_get = $_GET;
    $tmp_get['page'] = $i;
    print http_build_query($tmp_get) ?>">
        <?php print $i ?>
    </a>

<?php else : ?>
    <?php for ($i = 1; $i <= $page->getTotal(); $i++): ?>
        <a<?php if ($i == $page->getCurrent()): ?> class="current"<?php endif ?> href="?<?php $tmp_get = $_GET;
        $tmp_get['page'] = $i;
        print http_build_query($tmp_get) ?>">
            <?php print $i ?>
        </a>
    <?php endfor ?>
<?php endif; ?>
```
