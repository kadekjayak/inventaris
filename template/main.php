<html>
    <head>        
        <link href="template/bootstrap/css/bootstrap.css" rel=stylesheet>
        <script src="template/bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <title><?php print $pageData['title'] ?></title>
    </head>
    <body>
        
        <div class="container">
            <div class="jumbotron">
                <h1><?php print $pageData['header'] ?></h1>
                
            </div>
                        
            <?php if(isset($pageData['carousel'])) { 
                $cData=$pageData['carousel'];
                $i=0;
            ?>
            <div class="well">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    
                    <?php foreach($cData as $caData) {  ?>
                      <li data-target="#carousel-example-generic" data-slide-to="<?php print $i; ?>" class="active"></li>
                          
                    <?php $i++; } ?>
                  </ol>  
                    
                    
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                       <?php $i=0; foreach($cData as $caData) { $i++; ?>
                          <div class="item <?php if($i==1) { print 'active'; } ?>">
                          <img src="<?php print $caData['image'] ?>">
                          <div class="carousel-caption">
                            <h3><?php print $caData['title'] ?></h3>
                              <p><?php print $caData['description'] ?></p>
                          </div>
                        </div>
                      
                      <?php } ?>
                      
                  </div>
                
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
                
            </div>
            <?php } ?>
                <?php if(isset($pageData['menu'])) { ?>
                    <nav class="navbar navbar-default">
                        <?php print $pageData['menu']; ?>
                        <ul class="nav navbar-nav navbar-right">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php print $_COOKIE['user']; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <?php if($_COOKIE['user']!='Guest') {
                                print '<li><a href="?view=login&action=logout">Logout</a></li>';
                                
                                } else {
                                print '<li><a href="?view=login">Login</a></li>';
                                }
                                ?>
                                <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              
                            </ul>
                          </li>
                        </ul>
                    </nav>
                <?php } ?>
                    <?php if(!empty($pageData['alert'])) print $pageData['alert']; ?>
                   <?php print $pageData['content'] ?>
                
            
        </div>
        <hr>
        <footer>
            <div class="container">
                <?php print $pageData['footer']; ?>
            </div>
        </footer>
    </body>
</html>