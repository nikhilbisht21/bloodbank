<?php
// include 'server/config.php';

echo($_GET['name'])

/*
try{
    $conn=mysqli_connect($host,$user,$pass,$database);

    if(!$conn){
        throw new Exception(500);
    }

    $sql="select * from hospital where AP>0 or AN>0 or BP>0 or BN>0 or ABP>0 or ABN>0 or BOP>0 or BN>0";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            echo($row);
        }
        
    }else{
        echo('No records found');
    }

    mysqli_close($conn);
}
catch(Exception $e){
    echo($e);
}
*/
?>