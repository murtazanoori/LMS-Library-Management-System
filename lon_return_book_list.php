<?php 
session_start();
ob_start();
  ?>




<style>
.bti{
    background-color: Transparent;
    background-repeat:no-repeat;
    text-decoration:none;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    color:#007bff;
    font-weight:bold;
    float: left;
    margin-top: -10px;
    
}
</style>
<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Report
                <b class="mb-0">Section</b>
            </p>
        </div>
        
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="icon-home"></i>Home</a>

        </div>
        
    </div>
   
</div>

   

<!--end title-->


<!-- end row -->

<div class="row col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="header-title">Return Book</h4>
                        </div>
                        <div class="col-6">
                            <a href="return_all_report" class="btn btn-warning float-right">Report</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <div class="table-responsive mt-3">
                    
                    <div class="col-md-12">
                        <form>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Loaner ID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:#eee;">#</span>
                                        </div>
                                        <input type="text" class="form-control student_id" placeholder="Search by id.." style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Book ID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:#eee;">#</span>
                                        </div>
                                        <input type="text" class="form-control book_id" placeholder="Search by id.." style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 form-group">
                                    <button type="button" class="col-md-6 offset-4 btn btn-primary mdi mdi-magnify mt-4 search-loan">&nbsp;&nbsp;Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 data-table">

                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


<script src="js/jquery-3.4.1.js" charset="utf-8"></script>

<script>

  $('.search-loan').click(function(){
    var stu_id = $('.student_id').val();
    var b_id = $('.book_id').val();
    $.ajax({
      type: 'POST',
      url: 'return_single_report.php',
      dataType: 'json',
      data:{
        student_id : stu_id,
        book_id : b_id
      },success:function(res){
        $('.data-table').html('');
        if(res.loan_status != '1'){
            if((res.book_type == 'book') || (res.book_type == 'general') || (res.book_type == 'history') || (res.book_type == 'rule')){
                var table_book = '<table class="table table-responsive table-hover table-centered mb-0" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Student ID</th>\
                                <th>Name</th>\
                                <th>Last Name</th>\
                                <th>Book ID</th>\
                                <th>Book Title</th>\
                                <th>Loan Date</th>\
                                <th>Return Date</th>\
                                <th>Action</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                              <td>'+res[0]+'</td>\
                              <td>'+res.name+'</td>\
                              <td>'+res.lastname+'</td>\
                              <td>'+res.book_id+'</td>\
                              <td>'+res.book_title+'</td>\
                              <td>'+res.loan_date+'</td>\
                              <td>'+res.return_date+'</td>\
                              <td><a href="#!" class="btn btn-success return" book-id ="'+res.book_id+'" book-type ="'+res.book_type+'" row-id="'+res.l_id+'">Return Book</a></td>\
                            </tr>\
                        </tbody>\
                    </table>';
                    $('.data-table').append(table_book);
            }else if(res.book_type == 'fasilnama'){
                var table_book = '<table class="table table-responsive table-hover table-centered mb-0" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Student ID</th>\
                                <th>Name</th>\
                                <th>Last Name</th>\
                                <th>Book ID</th>\
                                <th>Book Title</th>\
                                <th>Loan Date</th>\
                                <th>Return Date</th>\
                                <th>Action</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                              <td>'+res[0]+'</td>\
                              <td>'+res.name+'</td>\
                              <td>'+res.lastname+'</td>\
                              <td>'+res.book_id+'</td>\
                              <td>'+res.fasilnama_title+'</td>\
                              <td>'+res.loan_date+'</td>\
                              <td>'+res.return_date+'</td>\
                              <td><a href="#!" class="btn btn-success return" book-id ="'+res.book_id+'" book-type ="'+res.book_type+'" row-id="'+res.l_id+'">Return Fasilnama</a></td>\
                            </tr>\
                        </tbody>\
                    </table>';
                    $('.data-table').append(table_book);
              }else if(res.book_type == 'monograph'){
                var table_book = '<table class="table table-responsive table-hover table-centered mb-0" id="order-listing">\
                        <thead class="bg-info text-white">\
                            <tr>\
                                <th>Student ID</th>\
                                <th>Name</th>\
                                <th>Last Name</th>\
                                <th>Book ID</th>\
                                <th>Book Title</th>\
                                <th>Loan Date</th>\
                                <th>Return Date</th>\
                                <th>Action</th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                              <td>'+res[0]+'</td>\
                              <td>'+res.name+'</td>\
                              <td>'+res.lastname+'</td>\
                              <td>'+res.book_id+'</td>\
                              <td>'+res.m_title+'</td>\
                              <td>'+res.loan_date+'</td>\
                              <td>'+res.return_date+'</td>\
                              <td><a href="#!" class="btn btn-success return" book-id ="'+res.book_id+'" book-type ="'+res.book_type+'" row-id="'+res.l_id+'">Return Monograph</a></td>\
                            </tr>\
                        </tbody>\
                    </table>';
                    $('.data-table').append(table_book);
              }
        }else{
            var error = '<div class="alert alert-success alert-dismissible text-center">\
                            <h6> Oops! No Record Found Or Book Was Returned</h6>\
                        </div>';
            $('.data-table').append(error);
        }
      }
    });
  });

  $('body').on('click', '.return', function(){
    let loan_id = $(this).attr('row-id');
    let book_id = $(this).attr('book-id');
    let book_type = $(this).attr('book-type');

    $.ajax({
        type: 'POST',
        url: 'return_book.php',
        dataType: 'json',
        data: {
            id: loan_id,
            book: book_id,
            btype: book_type,
        },success:function(ret){
            if(ret == 'return'){
                swal("Book Returned Successfully.!", {
                    icon: "success"
                });
                $('.data-table').fadeOut(500);
            }else{
                console.log('not return');
            }
        }
    });
  });
</script>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>
