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
    </style>
</head>
<!-- header dashboard -->
<div class="col-md-12 d-flex align-items-center justify-content-between">
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
<div class="bg-white col-md-12 p-4" style="min-height:30vh; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="col-md-12 p-4" style="border-radius:6px; background-color:#f9fbfd">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="validationCustomUsername">Section You Want To Add</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text menu-icon  icon-menu" style="background-color:#eee;"></span>
                    </div>
                    <select class="form-control section" style="height:40px;">
                        <option selected hidden>Select Section</option>
                        <option value="01">Add Book</option>
                        <option value="0011">Add Fasilnama</option>
                        <option value="0012">Add General Book</option>
                        <option value="0013">Add Rule Book</option>
                        <option value="14">Add Monograph</option>
                        <option value="0015">Add History Book</option>
                        <option value="0016">Add CD</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 form-group mb-3 faculty-showing">
                <label for="validationCustomUsername">Faculty</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text menu-icon  icon-graduation" style="background-color:#eee;"></span>
                    </div>
                    <?php 
                    include('connection_DB.php');
                            $Q = "SELECT * FROM faculty";
                       $query=mysqli_query($con,$Q);
                       $account=mysqli_num_rows($query);
                       ?>
                    <select class="form-control faculty" style="height:40px;">
                        <option selected hidden>Select Faculty</option>
                        <?php 
                      for($i=1; $i<=$account; $i++){
                          $row=mysqli_fetch_array($query);
                          ?>
                        <option value="<?php echo $row["faculty_id"]; ?>"><?php echo $row["faculty_name"]; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 form-group mb-3 department-showing">
                <label for="validationCustomUsername">Departmenet</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text menu-icon  icon-drawer" style="background-color:#eee;"></span>
                    </div>
                    
                    <select class="form-control department" name="department_id" style="height:40px;">
                    <option selected hidden>Select Department</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6 form-group mb-3 book-case-showing">
                <label for="validationCustomUsername">Book Case ID</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-server" style="background-color:#eee;"></span>
                    </div>
                    <?php 
                       $query=mysqli_query($con,"select DISTINCT(book_case_id) from book_case");
                       $account=mysqli_num_rows($query);
                       ?>
                    <select class="form-control book-case" style="height:40px;">
                        <option selected hidden>Select book case id</option>
                        <?php 
                      for($i=1; $i<=$account; $i++){
                          $row=mysqli_fetch_array($query);
                          ?>
                        <option value="<?php echo $row["book_case_id"]; ?>"><?php echo $row["book_case_id"]; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6 form-group mb-3 row-showing">
                <label for="validationCustomUsername">Book Case Row</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-table-row" style="background-color:#eee;"></span>
                    </div>
                    <select class="form-control row-case" style="height:40px;">
                        <option selected hidden>Select book row id</option>
                        
                    </select>
                </div>
            </div>

            <div class="col-md-6 form-group mb-3 column-showing">
                <label for="validationCustomUsername">Book Case Column</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-table-column-plus-after" style="background-color:#eee;"></span>
                    </div>
                    <select class="form-control column" style="height:40px;">
                        <option selected hidden>Select book Column id</option>
                        
                    </select>
                </div>
            </div>
        </div>
        <?php 
                include 'add_book_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b class=""><?= $_SESSION['response'];?></b>
        </div>
        <?php } unset($_SESSION['response']);?>
        <div style="margin-top:20px">
            <div class="book">
                <p class=" mdi mdi-notebook-multiple text-primary" style="font-size:1rem;"> Add Book</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>

                <!-- form -->
                <form action="add_book_insert_code.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon  icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control book_id text-danger" placeholder="System type book id" name="book_id" style="height:40px;">
    
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon   icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type title's of book here.." name="book_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author name here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Translator</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type translator name here.." name="translator" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Place</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-home" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type your publish place here.." name="publish_place" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publisher</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publisher name here.." name="publisher" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon   icon-calendar" style="background-color:#eee;"></span>
                                </div>
                                <input type="date" class="form-control" placeholder="Type your publish year here.." name="publish_year" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Volume</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text icon-layers" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type volume here.." name="volume" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book Edition</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon   icon-note" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book edition here.." name="book_edition" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Page</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text icon-docs" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type page number here.." name="page_number" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book Language</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-book-open" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book language here.." name="book_language" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        
                        <input type="hidden" name="faculty_id" id="faculty1-id-interface">
                        <input type="hidden" name="department_id" id="department1-id-interface">
                        <input type="hidden" name="case_id" id="case1-id-interface">
                        <input type="hidden" name="row" id="row1-id-interface">
                        <input type="hidden" name="column" id="column1-id-interface">
                        
                        <div class="col-md-6 form-group">
                            <input type="submit" name="subBook" value="Add Book" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="monograph">
                <p class="mdi mdi-library-books text-primary" style="font-size:1rem;"> Monograph</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <form action="add_monograph.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Monograph ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon   icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control text-danger" id="monograph_id" placeholder="System type monograph id" name="m_id" style="height:40px;">
                                <?php
                                $lastid = 0;
                                if(isset($_SESSION['count_number'])){
                                    $lastid = $_SESSION['count_number'];
                                }else{
                                    $lastid = 0;
                                }
                            ?>
                            <input type="hidden" name="count" value="<?php echo $lastid; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Monograph Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon  icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type title's here.." name="m_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author name here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Guide Teacher</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type guide teacher name here.." name="guide_teacher" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Graduation Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-calendar" style="background-color:#eee;"></span>
                                </div>
                                <input type="date" class="form-control" placeholder="Type graduation year here.." name="graduation_year" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Score</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  mdi mdi-format-list-numbered" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type score here.." name="score" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <input type="hidden" name="faculty_id" id="faculty2-id-interface">
                        <input type="hidden" name="department_id" id="department2-id-interface">
                        <input type="hidden" name="case_id" id="case2-id-interface">
                        <input type="hidden" name="row" id="row2-id-interface">
                        <input type="hidden" name="column" id="column2-id-interface">
                        <div class="col-md-6 form-group">
                            <input type="submit" name="subMonograph" value="Add Monograph" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <!-- FASILNAMA BOOK FORM -->
            <div class="fasilnama">
                <p class=" mdi mdi-layers text-primary" style="font-size:1rem;"> Fasilnama</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <!-- form -->
                <form action="add_fasilnama.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Fasilnama ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon menu-icon  icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control text-danger" id="fasilnama_id" placeholder="System type fasilnama id" name="fas_id" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Fasilnama Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon   icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type fasilnama title here.." name="fasilnama_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author name here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-calendar" style="background-color:#eee;"></span>
                                </div>
                                <input type="date" class="form-control" placeholder="Type publish year here.." name="publish_year" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername"> Fasilname Information</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-info" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type fasilnama info here.." name="fas_info" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Place</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-home" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publish place here.." name="publish_place" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Fasilnama Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-equalizer" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type fasilnam number here.." name="fas_number" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <div class="col-md-12 form-group mb-3 input-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationCustomUsername">Fasilnama Subject</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon  icon-speech" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Type fasilnama subject here.." name="fasilnama_subject[]" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-secondary mt-4 add">Add Subject</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="case_id" id="case3-id-interface">
                        <input type="hidden" name="row" id="row3-id-interface">
                        <input type="hidden" name="column" id="column3-id-interface">
                        <div class="col-md-6 form-group">
                            <input type="submit" name="subFasilnama" value="Add Fasilnama" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="general-book">
                <p class="mdi mdi-laptop-chromebook text-primary" style="font-size:1rem;"> General Book</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <form action="add_general_book" method="POST">
                    <div class="row">

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control text-danger" placeholder="System type general book id" id="general_id" name="general_id" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book title here.." name="book_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Subject</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-speech" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type subject  here.." name="subject" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername"> Translator</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type translator here.." name="translator" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publisher</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publisher here.." name="publisher" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Place</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-home" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publish_place here.." name="publish_place" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Volume</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-layers" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type volume here.." name="volume" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Edition</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon icon-note" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type edition here.." name="edition" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Page</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon icon-docs" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type page here.." name="page" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <input type="hidden" name="case_id" id="case4-id-interface">
                        <input type="hidden" name="row" id="row4-id-interface">
                        <input type="hidden" name="column" id="column4-id-interface">
                        <div class="col-md-6">
                            <input type="submit" name="general-btn" value="Add General Book" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="rule-book">
                <p class="mdi mdi-file-document-edit-outline text-primary" style="font-size:1rem;"> Rule Book</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <form action="add_rule_book" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Rule Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon   icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control text-danger" placeholder="System type rule book id" id="rule_id" name="rule_id" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book title here.." name="book_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Translator</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type translator here.." name="translator" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Place</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-home" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publish place here.." name="publish_place" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publisher</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publisher here.." name="publisher" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                                </div>
                                <input type="date" class="form-control" placeholder="Type publish year here.." name="publish_year" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Volume</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-layers" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type volume here.." name="volume" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Book Edition</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-note" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book edition here.." name="book_edition" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Page</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-docs" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type page here.." name="page" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <input type="hidden" name="case_id" id="case5-id-interface">
                        <input type="hidden" name="row" id="row5-id-interface">
                        <input type="hidden" name="column" id="column5-id-interface">
                        <div class="col-md-6">
                            <input type="submit" name="rule-btn" value="Add Rule Book" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="history">
                <p class="mdi mdi-book-variant text-primary" style="font-size:1rem;"> History Book</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <form action="add_history_book" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">History Book ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control text-danger" id="history_id" name="history_id" placeholder="System type history book id" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type book title here.." name="book_title" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author here.." name="author" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername"> Translator</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type translator here.." name="translator" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Place</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-home" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publish place here.." name="publish_place" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publisher</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type publisher here.." name="publisher" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Publish Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                                </div>
                                <input type="date" class="form-control" placeholder="Type publish year here.." name="publish_year" style="height:40px;">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Volume</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-layers" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type volume here.." name="volume" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Edition</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-note" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type edition here.." name="edition" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Page</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-docs" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type page here.." name="page" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <input type="hidden" name="case_id" id="case6-id-interface">
                        <input type="hidden" name="row" id="row6-id-interface">
                        <input type="hidden" name="column" id="column6-id-interface">
                        <div class="col-md-6">
                            <input type="submit" name="history-btn" value="Add History Book" class="col-md-6 offset-3 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="cd">
                <p class="mdi mdi-folder-multiple text-primary" style="font-size:1rem;"> CD File</p>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <form action="add_cd_of_book" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">CD ID</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon  icon-key" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control text-danger" id="cd_id" name="cd_id" placeholder="System type cd id" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Title</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-social-tumblr" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type cd title here.." name="cd_title" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Subject</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon icon-speech" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type subject here.." name="subject" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername"> Presenter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon icon-people" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type presenter here.." name="presenter" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Files Type</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text menu-icon mdi mdi-file-table-outline" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type files information here.." name="files_info" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Type author here.." name="author" style="height:40px;">
                            </div>
                        </div>


                        <div class="col-md-6 form-group mb-3">
                            <label for="validationCustomUsername">Issue</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text mdi mdi-format-list-numbered" style="background-color:#eee;"></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Type cd number here.." name="cd_number" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option selected hidden>Select Copy</option>
                            <?php for($i=1; $i<=10; $i++){?>
                                <option value="<?php echo $i; ?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                        <input type="hidden" name="case_id" id="case7-id-interface">
                        <input type="hidden" name="row" id="row7-id-interface">
                        <input type="hidden" name="column" id="column7-id-interface">
                        <div class="col-md-6">
                            <input type="submit" name="cd-btn" value="Add CD Of Book" class="col-md-6 btn btn-primary" style="margin-top: 25px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- end of form -->
    </div>
</div>
<!-- end of content -->

<form hidden>
    <input type="text" class="faculty-id-value">
    <input type="text" class="department-id-value">
    <input type="text" class="book-case-id-value">
    <input type="text" class="row-case-id-value">
    <input type="text" class="column-case-id-value">
</form>



<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script src="js/book.js"></script>
<script>
    $('.book-case').change(function(){
        var book_case_id = $('.book-case').val();
        $.ajax({
            type: 'POST',
            url: 'row-column.php',
            dataType: 'json',
            data: {
                bookCase : book_case_id
            },
            success: function(res){
                console.log(res);
                $('.row-case').html('');
                $('.column').html('');
                $.each(res, function(index, value){
                    var row = '<option value="'+value.c_row+'">'+value.c_row+'</option>';
                    var column = '<option>'+value.c_column+'</option>';
                    $('.row-case').append(row);
                    $('.column').append(column);
                });
            }
        });
    });

    $('.faculty').change(function(){
        let faculty_id = $('.faculty').val();
        $.ajax({
            type: 'POST',
            url: 'departments.php',
            dataType: 'json',
            data:{
                faculty_id: faculty_id
            },success:function(departments){
                $('.department').html('');
                $.each(departments, function(index, value){
                    var dep = '<option value="'+value.department_id+'">'+value.department_name+'</option>';
                    $('.department').append(dep);
                });
            }
        });
    });

    var new_input = '<div class="row">\
                                <div class="col-md-6">\
                                    <label for="validationCustomUsername">Fasilnama Subject</label>\
                                    <div class="input-group">\
                                        <div class="input-group-prepend">\
                                            <span class="input-group-text menu-icon  icon-speech" style="background-color:#eee;"></span>\
                                        </div>\
                                        <input type="text" class="form-control" placeholder="Type fasilnama subject here.." name="fasilnama_subject[]" style="height:40px;">\
                                    </div>\
                                </div>\
                                <div class="col-md-6">\
                                    <button type="button" class="btn btn-danger mt-4 remove">Remove Subject</button>\
                                </div>\
                            </div>';
    $('.add').click(function(){
        $('.input-container').append(new_input);
    });
    $('.input-container').on('click', '.remove', function(){
        $(this).closest($('.row')).remove();
    });
</script>

<!-- master page -->
<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>