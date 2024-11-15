<?php
ob_start();

?>

<head>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* design of save botton */
        #savebtn {
            right: 40px;
            bottom: 25px;
            position: fixed;
            border-radius: 50%;
            border: none;
            color: white;
            background-color: #0cca8e;
            border-color: #0cca8e;
            width: 60px;
            height: 60px;
            cursor: pointer;
            z-index: 9999;
            margin-bottom: 40px;
        }

        #savebtn:hover {
            color: #fff;
            background-color: #0ccc9e;
        }

        p.mdi-content-save-all {
            font-size: 33px;
        }
        div.loan-section{
            display: none;
        }
        div.book{
            display: none;
        }
        div.loan-date{
            display: none;
        }
        div.fasilnama{
            display:none;
        }
        div.general{
            display:none;
        }
        div.rule{
            display:none;
        }
        div.monograph{
            display:none;
        }
        div.history{
            display:none;
        }
    </style>
</head>
<!-- header dashboard -->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title"></h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Add
                <b class="mb-0">Section</b>
            </p>
        </div>
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="menu-icon icon-home"></i>Home</a>
        </div>
    </div>
</div>
<!-- end of header dashboard -->

<!--start of content -->
<div class="bg-white col-12 p-4" style="min-height:40vh; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="col-12 p-4" style="border-radius:6px; background-color:#f9fbfd">
        <p class="mdi mdi-book-open-page-variant text-primary" style="font-size:1rem;"> Loan</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
            <?php 
                include 'add_lon_return_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b class=""><?= $_SESSION['response'];?></b>
            </div>
            <?php } unset($_SESSION['response']);?>
            <!-- form -->
            <form action="" method="post" class="loan-form" enctype="multipart/form-data">
                <div class="row">
                    
                <div class="col-md-12 form-group mb-3">
                            <label for="validationCustomUsername">Employee ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control emp-id" name="emp-id" placeholder="Type Student ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary employee-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>
                        <div class="col-md-12 form-group mb-3 book">
                            <label for="validationCustomUsername">Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control book-id" name="book-id" placeholder="Type Book ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary book-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3 fasilnama">
                            <label for="validationCustomUsername">Fasilnama ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control fasilnama-id" name="fasilnama-id" placeholder="Type Fasilnama ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary fasilnama-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3 general">
                            <label for="validationCustomUsername">General Book</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control general-id" name="general-id" placeholder="Type General Book ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary general-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3 rule">
                            <label for="validationCustomUsername">Rule Book</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control rule-id" name="rule-id" placeholder="Type General Book ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary rule-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>


                        <div class="col-md-12 form-group mb-3 monograph">
                            <label for="validationCustomUsername">Monograph ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control monograph-id" name="monograph-id" placeholder="Type Monograph ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary monograph-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3 history">
                            <label for="validationCustomUsername">History Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control history-id" name="history-id" placeholder="Type Monograph ID Here To Search" style="height:40px;">
                                <button type="button" class="btn btn-primary history-search"><span class="mdi mdi-magnify"></span></button>
                            </div>
                        </div>
                        
                        <div class="col-md-12 table-data">

                        </div>
                        <div class="col-md-4 form-group loan-section">
                            <label for="validationCustomUsername">What Do You Want To Loan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-docs" style="background-color:#eee;"></span>
                                </div>
                                <select class="form-control loan-section-select" style="height:40px;">
                                    <option selected hidden>Select Section</option>
                                    <option value="book">Loan Book</option>
                                    <option value="fasilnama">Loan Fasilnama</option>
                                    <option value="general">Loan General Book</option>
                                    <option value="rule">Loan Rule Book</option>
                                    <option value="monograph">Loan Monograph</option>
                                    <option value="history">Loan History Book</option>
                                </select>
                            </div>
                        </div>
                <div class="col-12 book-table">

                </div>

                
                <div class="col-12 loan-date p-0">
                    <div class="row">
                    <!-- <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Loan Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="date" class="form-control" name="loan-date" style="height:40px;">
                                    </div>
                                </div> -->
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Return Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="date" class="form-control" name="return-date" style="height:40px;">
                                    </div>
                                </div>
                    </div>
                </div>
                <input type="hidden" name="book-type" class="book-name">
                <button type="submit" name="submit-book-btn" id="savebtn">
                    <p class="mdi mdi-content-save-all"></p>
                </button>
            </form>
        </div>

        <!-- end of form -->
    </div>
</div>
</div>
<!-- end of content -->

<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
        }, 2000);

        $('.employee-search').click(function(){
            var id = $('.emp-id').val();
            $.ajax({
                type: 'POST',
                url: 'emp_search.php',
                dataType: 'json',
                data:{
                    employee_id : id
                },
                success:function(res){
                    if(res == 'no record'){
                        $('.table-data').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-section').hide();
                                $('.table-data').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>ID</th>\
                                <th>Name</th>\
                                <th>Last Name</th>\
                                <th>Enail</th>\
                                <th>Action</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+res.e_id+'</td>\
                                <td>'+res.name+'</td>\
                                <td>'+res.lastname+'</td>\
                                <td>'+res.email+'</td>\
                                <td>\
                                    <div class="btn-group dropdown">\
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>\
                                        <div class="dropdown-menu dropdown-menu-right">\
                                            <a class="dropdown-item loan" href="#loan-section"><i class="mdi mdi-pencil mr-1 text-muted"></i>Loan</a>\
                                        </div>\
                                </td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.table-data').append(table);
                    }
                    

                }
            });
        });

        $('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'book'){
                $('.book').show();
                $('.loan-form').attr('action', 'add_lon_book_emp_code.php');
                $('.book-name').val(section_value);
            }else if(section_value == 'fasilnama'){
                $('.loan-form').attr('action', 'add_lon_fasilnama_emp_code.php');
                $('.book-name').val(section_value);
            }
            else if(section_value == 'general'){
                $('.loan-form').attr('action', 'add_general_emp_code.php');
                $('.book-name').val(section_value);
            }else if(section_value == 'rule'){
                $('.loan-form').attr('action', 'add_lon_rule_emp_code.php');
                $('.book-name').val(section_value);
            }else if(section_value == 'monograph'){
                $('.loan-form').attr('action', 'add_lon_monograph_emp_code.php');
                $('.book-name').val(section_value);
            
            }else if(section_value == 'history'){
                $('.loan-form').attr('action', 'add_lon_history_emp_code.php');
                $('.book-name').val(section_value);
            }
        });

        $('.book-search').click(function(){
            var b_id = $('.book-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    book_id: b_id 
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Book Tile</th>\
                                <th>Author</th>\
                                <th>Translator</th>\
                                <th>Language</th>\
                                <th>Book Copy</th>\
                                <th>Page Number</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.book_title+'</td>\
                                <td>'+data.author+'</td>\
                                <td>'+data.translator+'</td>\
                                <td>'+data.book_language+'</td>\
                                <td>'+data.copy+'</td>\
                                <td>'+data.number_page+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });
    });
</script>



<script>


    
$('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'fasilnama'){
                $('.fasilnama').show();
                $('.fasilnamaa-name').val(section_value);
            }
        });

        $('.fasilnama-search').click(function(){
            var fas_id = $('.fasilnama-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    fasilnama_id: fas_id
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Fasilnama ID</th>\
                                <th>fasilnama Title</th>\
                                <th>Author</th>\
                                <th>Publish Year</th>\
                                <th>Fasilnama Number</th>\
                                <th>Copy</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.fasilnama_id+'</td>\
                                <td>'+data.fasilnama_title+'</td>\
                                <td>'+data.author+'</td>\
                                <td>'+data.publish_year+'</td>\
                                <td>'+data.fas_number+'</td>\
                                <td>'+data.copy+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });
</script>


<script>


    
 //general book ajax code
 $('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'general'){
                $('.general').show();
                $('.generall-name').val(section_value);
            }
        });

        $('.general-search').click(function(){
            var ge_id = $('.general-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    general_id: ge_id
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>General Book ID</th>\
                                <th>Book Title</th>\
                                <th>Author</th>\
                                <th>Translator</th>\
                                <th>Page</th>\
                                <th>Copy</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.general_book_id+'</td>\
                                <td>'+data.book_title+'</td>\
                                <td>'+data.author+'</td>\
                                <td>'+data.translator+'</td>\
                                <td>'+data.page+'</td>\
                                <td>'+data.copy+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });

</script>

<script>


    
 //rule book ajax code
 $('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'rule'){
                $('.rule').show();
                $('.rule-namee').val(section_value);
            }
        });

        $('.rule-search').click(function(){
            var re_id = $('.rule-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    bookrule_id: re_id
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Rule Book ID</th>\
                                <th>Book Title</th>\
                                <th>Author</th>\
                                <th>Translator</th>\
                                <th>Page</th>\
                                <th>Copy</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.r_id+'</td>\
                                <td>'+data.book_title+'</td>\
                                <td>'+data.Author+'</td>\
                                <td>'+data.Translator+'</td>\
                                <td>'+data.page+'</td>\
                                <td>'+data.copy+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });

</script>




<script>


    
 //general book ajax code
 $('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'monograph'){
                $('.monograph').show();
                $('.monograph-name').val(section_value);
            }
        });

        $('.monograph-search').click(function(){
            var mo_id = $('.monograph-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    monograph_id: mo_id
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Monograph Book ID</th>\
                                <th>Book Title</th>\
                                <th>Author</th>\
                                <th>Translator</th>\
                                <th>Page</th>\
                                <th>Copy</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.mo_id+'</td>\
                                <td>'+data.m_title+'</td>\
                                <td>'+data.Author+'</td>\
                                <td>'+data.guide_teacher+'</td>\
                                <td>'+data.graduation_year+'</td>\
                                <td>'+data.score+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });

</script>


<script>


    
 //history book book ajax code
 
 $('body').on('click', '.loan', function(){
            $('.loan-section').show();
        });

        $('.loan-section-select').change(function(){
            var section_value = $('.loan-section-select').val();
            if(section_value == 'history'){
                $('.history').show();
                $('.history-name').val(section_value);
            }
        });

        $('.history-search').click(function(){
            var h_id = $('.history-id').val();
            $.ajax({
                type: 'POST',
                url: 'stu_tea_emp_search.php',
                dataType: 'json',
                data: {
                    bookh_id: h_id 
                },
                success:function(data){
                    if(data == 'no record'){
                        $('.book-table').html('');
                        var error = '<div class="alert alert-success alert-dismissible text-center">\
                                    <h6> Oops! No Record Found</h6>\
                                </div>';
                                $('.loan-date').hide();
                                $('.book-table').append(error);
                    }else{
                        var table = '<table class="table table-responsive table-hover table-centered mb-0 offset-1" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>History Book ID</th>\
                                <th>Book Title</th>\
                                <th>Author</th>\
                                <th>Translator</th>\
                                <th>Publish Year</th>\
                                <th>Copy</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>'+data.hs_id+'</td>\
                                <td>'+data.book_title+'</td>\
                                <td>'+data.Author+'</td>\
                                <td>'+data.Translator+'</td>\
                                <td>'+data.publish_place+'</td>\
                                <td>'+data.copy+'</td>\
                            </tr> \
                        </tbody>\
                    </table>';
                    $('.book-table').append(table);
                    $('.loan-date').show();
                    }
                }
            });
        });
</script>









<!-- master page -->
<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>