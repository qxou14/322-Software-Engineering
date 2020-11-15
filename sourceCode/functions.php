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





?>