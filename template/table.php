<table class="table <?php print $tableStyle; ?>">
    <?php if(!empty($itemHead)) { ?>
        <thead>
                <?php foreach($itemHead as $itemHead) { ?>
                    <th><?php print $itemHead; ?></th>
                <?php } ?>
        </thead>
    <?php } ?>
    <tbody>
    <?php foreach($item as $row) {?>
        <tr>
            <?php foreach($row as $column) {?>
                <td><?php print $column; ?></td>
            <?php } ?>
        </tr>    
    <?php }?>
    </tbody>
</table> 