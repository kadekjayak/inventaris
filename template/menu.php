

<ul class="nav navbar-nav <?php print $style; ?>">
    <?php foreach($it as $item) { 
        $link=isset($item['link']) ? $item['link'] : '#';
        $class=isset($item['class']) ? $item['class'] : '';
        $title=isset($item['title']) ? $item['title'] : '#';
    ?>
        <li class="<?php print $class; ?>"> <a href="<?php print $link; ?>"> <?php print $title; ?> </a></li>
    <?php } ?>
</ul>
