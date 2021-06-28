<html>
    <head>
        <title>Image Add On Database</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
    <div class="container">
        <div class="jumbotron">
            <form action="admin/slider_add_func.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-12 control-label h4">Slider Image:</label>
                <div class="col-md-12">
                    <input class="form-control" type="file" name="img">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12 control-label h4">Content:</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="content">
                </div>
            </div>
                
            <div class="form-group">
                <div class="col-md-12">
                    <input class="btn btn-primary btn-md" type="submit" name="submit">
                </div>
            </div>
                
            </form>
        </div>
    </div>
    </body>
</html>