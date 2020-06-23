<?php

    session_start();



    if (isset($_POST['submit'])) {
        
        include '../Reg.php';

        $username = mysqli_real_escape_string($conn, $_POST['Uname']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //Error handlers

        //Check if empty

        if (empty($username) || empty($password)) {
            header("Location: index.html?login=empty");
            exit();

        }else{
            $sql = "SELECT * FROM uber_riders WHERE username=$username";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck < 1) {
                header("Location: index.html?login=error");
                exit();
            }else{
                if ($row = mysqli_fetch_assoc($result)) {
                    //Password De-hash
                    $hashedPassCheck = password_verify($password, $row['password']);

                    if ($hashedPassCheck == false) {
                        header("Location: index.html?login=error_pas");
                        exit();
                    }elseif ($hashedPassCheck == true) {
                        //User Logs in here
                        $SESSION['u_ser'] = $row['username'];
                        $SESSION['u_first'] = $row['f_name'];
                        $SESSION['u_last'] = $row['l_name'];
                        $SESSION['u_ser'] = $row['email_address'];
                        $SESSION['u_ser'] = $row['phone'];

                        header("Location: Main-auth.html");
                        exit();
                    }
                }
            }

        }

    }else {
        header("Refresh:0");
        exit();
    }

?>