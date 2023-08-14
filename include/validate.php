<?php 
    function validate($x){
            $x = trim($x);
            $x = stripslashes($x);
            $x = htmlspecialchars($x);

            return $x;
    }

    function verify($x,$type){
        $result=[];
        switch ($type){
            case "name":
                if(strlen($x)>50){
                    $result['status']='false';
                    $result['message']='Name should be less than 50 characters';  
                    return $result;                  

                }elseif
                (!preg_match('/^[a-z A-Z]+$/i',$x)){
                    $result['status']='false';
                    $result['message']='Name should consist of alphabets';
                    return $result;
                }        
        }
        $result['status']='true';
        return $result;
    }

?>