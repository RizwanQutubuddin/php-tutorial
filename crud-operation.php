<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>crud-operation in PHP with Ajax</title>
</head>
<body>
    <div class="container">
        
        <h1>crud-operation in PHP with Ajax</h1>
        <form id='add-form'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="first_name"/></td>
                        <td><input type="text" name="last_name"/></td>
                        <td><input type="submit" id="insert-data" value="Submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div id="error-message"></div>
        <div id="success-message"></div>

        <table class="table table-striped">
            <thead>
            <tr>
                <td>
                <select class="form-select" id="pageList">
                    <option value='10'>10</option>
                    <option value='20'>20</option>
                    <option value='50'>50</option>
                    <option value='100'>100</option>
                    <option value='all'>All</option>
                </select>
                </td>
                <td></td>
                <td><input type="text" id="seachData" placeholder="search"></td>
            </tr>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table-load">
            </tbody>
        </table>
        
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="hidden" name="update-id" value="">
                                        <input type="text" name="update-fname" value="">
                                    </td>
                                    <td>
                                        <input type="text" name="update-lname" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><input type="submit" class="btn btn-success" name="update" data="" value="update" data-bs-dismiss="modal"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                loadTable();

                //load operation
                function loadTable(){
                    $.getJSON(
                        "crud/ajax-load.php",
                        function(data){
                            if(data['result'].length>0){
                                let cnt=1;
                                $("#table-load").html('');
                                $.each(data['result'],function(key, row){
                                    $("#table-load").append(`<tr>
                                        <td>${cnt++}</td>
                                        <td>${row["first_name"]}</td>
                                        <td>${row["last_name"]}</td>
                                        <td><input type="button" class="btn btn-primary" name="edit" data-eid="${row["id"]}" data-bs-toggle="modal" data-bs-target="#myModal" value="Edit"> | <input type="button" class="btn btn-danger" name="delete" data-id="${row["id"]}" value="Delete"></td>
                                    </tr>`);
                                })
                            }else{
                                $("#table-load").append(`<tr>
                                        <td colspan="4">no records found</td>
                                    </tr>`);
                            }
                        }
                    );
                }

                //insert opration
                $('#insert-data').on('click',function (e) {
                    e.preventDefault();
                    let fname=$('input[name="first_name"]').val();
                    let lname=$('input[name="last_name"]').val();
                    if(fname=='' || lname==''){
                        $('#error-message').html('All field are required').slideDown().slideUp(5000);
                    }else{
                        $.ajax({
                            url:'crud/ajax-insert.php',
                            type:'POST',
                            data:{first_name:fname,last_name:lname},
                            success:function(data){
                                if(data==1){
                                    loadTable();
                                    $('#add-form').trigger("reset");
                                    $('#success-message').html('Record inserted successfully').slideDown().slideUp(5000);
                                }else{
                                    $('#success-message').html('Cant save record').slideDown().slideUp(5000);
                                }
                            }
                        })
                    }
                    
                });

                //delete operation
                $(document).on('click','input[name="delete"]',function(){
                    let studentId=$(this).data('id');
                    let element=this;
                    $.ajax({
                        url:'crud/ajax-delete.php',
                        type:'POST',
                        data:{id:studentId},
                        success:function(data){
                            if(data==1){
                                $(element).closest("tr").fadeOut();
                                $('#success-message').html('Record Deleted successfully').slideDown().slideUp(5000);
                            }else{
                                $('#success-message').html('Cant Delete record').slideDown().slideUp(5000);
                            }
                        }
                    });
                });

                //get data by id operation
                $(document).on('click','input[name="edit"]',function(){
                    let studentId=$(this).data('eid');
                    
                    $.ajax({
                        url:'crud/ajax-get.php',
                        type:'POST',
                        data:{id:studentId},
                        success:function(data){
                            var data=JSON.parse(data);
                            if(data['result'].length>0){
                                $("input[name='update-id']").val(data['result'][0].id);
                                $("input[name='update-fname']").val(data['result'][0].first_name);
                                $("input[name='update-lname']").val(data['result'][0].last_name);
                            }
                        }
                    });
                });

                //update data by id operation
                $(document).on('click','input[name="update"]',function(){
                    let studentId=$('input[name="update-id"]').val();
                    let fname=$('input[name="update-fname"]').val();
                    let lname=$('input[name="update-lname"]').val();
                    if(fname=='' || lname==''){
                        $('#error-message').html('All field are required').slideDown().slideUp(5000);
                    }else{
                        $.ajax({
                            url:'crud/ajax-update.php',
                            type:'POST',
                            data:{id:studentId,first_name:fname,last_name:lname},
                            success:function(data){
                                if(data==1){
                                    loadTable();
                                    $('#success-message').html('Record Updated successfully').slideDown().slideUp(5000);
                                }else{
                                    $('#success-message').html('Cant Update record').slideDown().slideUp(5000);
                                }
                            }
                        })
                    }
                });

                //search data
                $(document).on('keyup','#seachData',function(){
                    let seachData=$('#seachData').val();
                    if(seachData!==''){
                        $.ajax({
                            url:'crud/ajax-search.php',
                            type:'POST',
                            data:{searchData:seachData},
                            success:function(data){
                                $('#table-load').html(data);
                            }
                        })
                    }else{
                        loadTable();
                    }
                })

            });
        </script>
</body>       
</html>