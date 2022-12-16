<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>ajax</title>
</head>
<div class="container">
    <body>
    <h1>PHP with Ajax</h1>
    <p><input type="button" id="load-button" value="Load Data"></p>
    <div id="table-load"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#load-button').on('click',function (e) {
                    $.ajax({
                        url:'ajax-load.php',
                        type:'POST',
                        success:function(data){
                            $("#table-load").html(data);
                        }
                    })
                })
            });
        </script>
    </body>
</div>
</html>