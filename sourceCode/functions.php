<?php 
    
    include_once 'database.php'; 

    
    function accountExist($conn,$username, $pwd)
    {
        

        if($username != "" && $pwd != "")
        {
            $sql = "SELECT * FROM info  WHERE username = '$username' and pwd = '$pwd' ";
            $result = mysqli_query($conn,$sql);
            $check = mysqli_fetch_array($result);

            if(isset($check))
            {
                return true;
            }
            else
            {
                return false;
            }

            }

        
    }

    function deleteS($conn,$username)
    {
        $sql = "DELETE FROM info WHERE username = '$username'";
        mysqli_query($conn,$sql);
    }

    function vipgone($conn, $username)
    {
        $sql = "UPDATE info SET level =0, warning = 0 WHERE username = '$username' and warning >=2";
        mysqli_query($conn,$sql);

    }

    function upgradeVip($conn,$username)
    {
        $sql = "UPDATE info SET level =1 WHERE username = '$username'";
        mysqli_query($conn,$sql);
    }

    function expire($conn,$username)
    {
        $sql = "UPDATE info SET expire = 1 WHERE username = '$username'";
        mysqli_query($conn,$sql);

    }

    $TabooWords = array("disguesting","gross","bad","nasty");





?>