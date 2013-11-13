<html>
    <head>        
        <link href="template/bootstrap/css/bootstrap.css" rel=stylesheet>
        <link href="template/bootstrap/js/jquery.js">
        <script src="template/bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="template/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <title>[@title]</title>
    </head>
    <body>
        
        <div class="container">
            <div class="jumbotron">
                <h1>[@header]</h1>
            </div>
            
            <div class="row">
                <div class="col-sm-9">
                   [@content]
                </div>
                <?php if(isset($pdata[menu])) { ?>
                <div class="col-sm-3">
                   [@menu]
                </div>
                <?php } ?>
            </div>
            
        </div>
        <hr>
        <footer>
            <div class="container">
                [@footer]
            </div>
        </footer>
    </body>
</html>