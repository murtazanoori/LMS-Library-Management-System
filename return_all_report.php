<?php 
ob_start();
session_start();
  ?>

<style>
    .report-table{
        display: none;
    }
   
@media print{
    body * {
        visibility: hidden;
       
    }
    .print-container, .print-container * {
        visibility: visible;
        border: none;
        
        margin-left: -100px;
      
        
        
    }
}


</style>




<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Loan
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
                <h4 class="header-title">Loan Report</h4><br>
                <button onclick="window.print();" type="submit" class="btn btn-info float-right" name="" style="margin-top:-60px;" ><i class="menu-icon icon-printer"></i> Print</button>  
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <div id="main-content">
                    <div class="container-fluid ">
                        <div class="block-header">

                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="">
                                    <br><br>
                                    <div class="body">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-5 form-group">
                                                    <label for="validationCustomUsername">Report From</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text menu-icon icon-docs"
                                                                style="background-color:#eee;"></span>
                                                        </div>
                                                        <select class="form-control report-from" style="height:40px;">
                                                            <option selected hidden>Select Report</option>
                                                            <option value="book">Book Report</option>
                                                            <option value="fasilnama">Fasilnama Report</option>
                                                            <option value="general">General Book Report</option>
                                                            <option value="rule">Rule Book Report</option>
                                                            <option value="monograph">Monograph Report</option>
                                                            <option value="history">History Book Report</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="validationCustomUsername">Report Section</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text menu-icon icon-docs"
                                                                style="background-color:#eee;"></span>
                                                        </div>
                                                        <select class="form-control report-section" id='section-data'
                                                            style="height:40px;">
                                                            <option selected hidden>Select Report Section</option>
                                                            <option value="0">Studnet Report</option>
                                                            <option value="1">Teacher Report</option>
                                                            <option value="2">Employee Report</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <button type="button" class="btn btn-primary mt-4 show">Show</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 report-table  print-container">
                                            <table class="table table-responsive table-bordered table-hover" id='date-table'>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="report-data"> </div>
<!-- end row -->

<input type="hidden" class="reportFrom">
<input type="hidden" class="reportSection">


<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>



<script>
$('.report-from').change(function() {
    let report_from = $('.report-from').val();
    $('.reportFrom').val(report_from);
});
$('.report-section').change(function() {
    let report_section = $('.report-section').val();
    $('.reportSection').val(report_section);
});

$('.show').click(function(){
    let from = $('.reportFrom').val();
    var sectionData = $('#section-data').val();
    let section = $('.reportSection').val();

    var std  = `<thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Loan Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>`;

    var tchr = `<thead>
                    <tr>
                        <th>Techer ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Loan Date</th>

                        <th>Return Date</th>
                    </tr>
                </thead>`;
    $.ajax({
        type: 'POST',
        url: 'return_all_report_code.php',
        dataType: 'json',
        data: {
            from: from,
            section: section
        },success:function(res){
            $.each(res, function(index, value){
                if(sectionData == '0'){
                std = std + `<tr>
                        <td>` +value.stu_id+` </td>
                        <td>`+value.name+`</td>
                        <td>`+value.lastname+`</td>
                        <td>`+value.book_id+`</td>
                        <td>`+value.book_title+`</td>
                        
                        <td>`+value.loan_date+`</td>
                        <td>`+value.return_date+`</td>
                    </tr>`;
                }
                
            });
            $('#date-table').html(std);
            $('.report-table').css('display', 'block');
        }
    });
    
});


</script>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>