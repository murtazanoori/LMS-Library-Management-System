<?php
ob_start();

?>
 <!-- <link rel="stylesheet" type="text/css" href="print.css" media="print"> -->
<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    <button onclick="window.print();" type="submit" class="btn btn-info" name="" ><i class="menu-icon icon-printer"></i> Print</button>  
       
    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Print
                <b class="mb-0">Section</b>
            </p>
        </div>
        
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="icon-home"></i>Home</a>

        </div>
        
    </div>
   
</div>
<style>
@media print{
    body * {
        visibility: hidden;
    }
    .print-container, .print-container * {
        visibility: visible;
        border: none;
        
        
    }
}

</style>

<div class="row print-container col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Recent Print Barcods</h4><br>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>

               

                
               

                <?php

include 'connection_DB.php';
session_start();

if(isset($_POST['generateBarcode'])) {
    $ides = $_POST['barcodeText'];
    foreach($ides as $y)
    {
        $query = mysqli_query($con, 'SELECT copy FROM fasilnama WHERE fasilnama_id = "'.$y.'" LIMIT 0,1');
        $row = mysqli_fetch_array($query);
        $book_copy = $row[0];
        for($i = 1; $i<=$book_copy; $i++){
            $barcodeText = trim($y);
            $barcodeType=$_POST['barcodeType'];
            $barcodeDisplay=$_POST['barcodeDisplay'];
            $barcodeSize=$_POST['barcodeSize'];
            $printText=$_POST['printText'];
            
            
            echo "<div class='float-left mr-1 mb-2'>";
            echo '<h4>Gawharshad University</h4>';
            echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';
                echo "</div>";
        }
        
    }
}


?>

                
                
            </div>
        </div>
    </div>
</div>





<style>
img.barcode {
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
}
</style>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>