<?php
include "config.php";

if(isset($_POST['update'])) {
    $first_name = $_POST['firstname'];
    $user_id = $_POST['userid'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql = "UPDATE `users` SET 'firstname'= '$firstname', 'lastname'=  '$lastname', 'email'= '$email', 'password'= '$password', 'gender'= '$gender' WHERE 'id'='$user_id'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "Record Updated Succesfully";
    }
    else{
        echo "Error:". $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM 'users' WHERE 'id'='$user_id'";

    $result = $conn->query($sql);
    

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
        }

        ?>
        <h2>User Update Form</h2>
        <form action="" method= "POST">
        <fieldset>
        <legend> Personal Information: </legend>
        First Name: <br>
        <input type ="text", name = "firstname" value= "<?php echo $first_name; ?>">
        <input type ="hidden", name = "user_id" value= "<?php echo $id; ?>">
        <br>
        Last Name: <br>
        <input type ="text", name = "lastname"value= "<?php echo $last_name; ?>">
        <br>   
        Password: <br>
        <input type ="password", name = "password" value= "<?php echo $password; ?>">
        <br>
        Email: <br>
        <input type ="email", name = "email" value= "<?php echo $email; ?>">
        <br>
        Gender: <br>
        <input type ="radio", name = "gender" value='Male' <?php if($gender == 'Male'){echo "checked";}?> >Male
        <input type ="radio", name = "gender" value='Female' <?php if($gender == 'Female'){echo "checked";}?> >Female
        <br> <br>
        <input type ="submit", name = "update" value="update">
        </fieldset>
    </form> 

    </body>
    </html>

    <?php

    }else {
        header('Location: view.php');
    }
}
?>