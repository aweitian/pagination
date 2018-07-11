<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/11
 * Time: 13:28
 * @var \Aw\EllipsisPagination $page
 */
?>


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
