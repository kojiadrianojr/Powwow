<?php
  if (isset($_POST['submit'])) {
    $bio = mysqli_real_escape_string($con, $_POST['bio']);
    $email = mysqli_real_escape_string($con, $_POST['uemail']);

    $imgFile = $_FILES['pic']['name'];
    $tmp_dir = $_FILES['pic']['tmp_name'];
    $imgSize = $_FILES['pic']['size'];

    $upload_dir = "../profiles/$uname/";
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    $hashedname = rand(1000,1000000);
    $userpic = md5($hashedname).".".$imgExt;
    $picpath = $upload_dir.".".$userpic;


    $valid_extensions = array('jpeg', 'jpg', 'png');
     $sql ="UPDATE user_account SET user_acc_email = '$email' , user_acc_bio = '$bio' , user_acc_pic = '$picpath' WHERE user_id = '$user_id' ";

      if(in_array($imgExt, $valid_extensions)) {   
         if($imgSize < 500000) {
            move_uploaded_file($tmp_dir,$picpath);
            mysqli_query($con, $sql);
            echo '<script>
              alert("Successfuly Updated");
              openedit();
              </script>';

            } else {
                echo '<script>
              alert("Exceeding Filesize");
              openedit();
              </script>';
              }
      } else {
          echo '<script>
        alert("Invalid Image!");
        openedit();
        </script>'; 
        }
  }
?>