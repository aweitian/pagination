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