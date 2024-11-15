<?php
    
    include 'connection_DB.php';

    if (isset($_POST['done'])) {
        # code...
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = "INSERT INTO `contact_us`(`full_name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message') ";
        $result = mysqli_query($con,$query);
        if ($result) {
            # code...
            header("Location:contact?Data_Submit");
        }else {
            # code...
            header("Location:contact?Data_Cant_Submit");
        }

    }


?>