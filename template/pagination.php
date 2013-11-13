<div class="containter">
<ul class="pager">
    <?php
    $url=cleanuri('page');
    for ($i=1; $i<=$count; $i++) { ?>
        <li class="<?php if($i==$active) print 'active'; ?>">
            <a href="<?php echo $url,'&page=',$i; ?>"><?php print $i; ?></a>
        </li>
    <?php } ?>
</ul>
    </div>