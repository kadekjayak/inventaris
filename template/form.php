
<?php if($style!='form-inline') { ?>

    <form class="<?php print $style; ?>" method="<?php print $method; ?>" action="<?php print $action; ?>">
        <?php foreach($item as $it) {
            $title=isset($it['title']) ? $it['title'] : '';
            $type=isset($it['type']) ? $it['type'] : '';
            $value=isset($it['value']) ? $it['value'] : '';
            $name=isset($it['name']) ? $it['name'] : '';
            $class=isset($it['class']) ? $it['class'] : '';
            $state=isset($it['state']) ? $it['state'] : '';
            $error=isset($it['error']) ? '<p class="text-danger">'.$it['error'].'</p>' : '';
        if($type!='hidden') {
        ?>
        
            <div class="form-group <?php if($error) print "has-error";  ?> ">
                <label class="col-sm-3 control-label"><?php print $title; ?></label>
                <div class="col-sm-9">
                    <?php if($type=='select') { ?>
                        <select class="form-control" name="<?php print $name; ?>" <?php print $state; ?>>
                            <?php  foreach($value as $v) {
                                print '<option value="'.$v[0].'">'.$v[1].' </option>';
                            } ?>
                        </select>
                    <?php } else if($type=='textarea') { ?> 
                        <textarea name="<?php print $name; ?>" value="<?php print $value; ?>" class="form-control" <?php print $state; ?> > <?php print $value; ?></textarea>
                    <?php } else {  ?>
                        <input class="form-control" name="<?php print $name; ?>" type="<?php print $type; ?>" value="<?php print $value; ?>" <?php print $state; ?> /> 
                        <?php  print $error; ?>  
                
                <?php }  ?>
                </div>
                
              </div>
        <?php } else { ?>
            <input type="hidden" value="<?php print $value; ?>" name="<?php print $name; ?>">
        <?php } } ?> 
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button class="btn btn-primary" type="submit" >Submit</button>  
            </div>
        </div>
    </form>
<?php } else { ?>
    
    <form class="<?php print $style; ?>" method="<?php print $method; ?>" action="<?php print $action ?>">
        <?php foreach($item as $it) {
            $title=isset($it['title']) ? $it['title'] : '';
            $type=isset($it['type']) ? $it['type'] : '';
            $value=isset($it['value']) ? $it['value'] : '';
            $name=isset($it['name']) ? $it['name'] : '';
            $class=isset($it['class']) ? $it['class'] : '';
            $state=isset($it['state']) ? $it['state'] : '';
            $error=isset($it['error']) ? '<p class="text-danger">'.$it['error'].'</p>' : '';
        if($type!='hidden') {
        ?>
        
            <div class="form-group <?php if($error) print "has-error";  ?> ">
                
                    <?php if($type=='select') { ?>
                        <select class="form-control" name="<?php print $name; ?>" <?php print $state; ?>>
                            <?php  foreach($value as $key => $v) {
                                print '<option value="'.$key.'">'.$v.' </option>';
                            } ?>
                        </select>
                    <?php } else if($type=='textarea') { ?> 
                        <textarea name="<?php print $name; ?>" value="<?php print $value; ?>" class="form-control" <?php print $state; ?> > <?php print $value; ?></textarea>
                    <?php } else if($type=='label') {?>
                        <label><?php print $title; ?></label>
                    <?php } else {  ?>
                        <input class="form-control" name="<?php print $name; ?>" type="<?php print $type; ?>" value="<?php print $value; ?>" <?php print $state; ?> /> 
                        <?php  print $error; ?>  
                
                <?php }  ?>
                </div>
                
              
        <?php } else { ?>
            <input type="hidden" value="<?php print $value; ?>" name="<?php print $name; ?>">
        <?php } } ?> 
        <div class="form-group">
            
                <button class="btn btn-default" type="submit" >Submit</button>  
            
        </div>
    </form>

<?php } ?>