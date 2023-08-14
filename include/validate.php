<?php 
    function validate($x){
            $x = trim($x);
            $x = stripslashes($x);
            $x = htmlspecialchars($x);

            return $x;
    }

    function verify($x,$type,$length){
        $result=[];
        switch ($type){
            case "name":
                if(strlen($x)>$length){
                    $result['status']='false';
                    $result['message']='Name should be less than '.$length.' characters';  
                    return $result;                  

                }elseif
                (!preg_match('/^[a-z A-Z]+$/i',$x)){
                    $result['status']='false';
                    $result['message']='Name should consist of alphabets';
                    return $result;
                }  
                break; 

                case "desc":
                    if(strlen($x)>$length){
                        $result['status']='false';
                        $result['message']='Description should be less than '.$length.' characters';  
                        return $result;                  
    
                    }elseif
                    (!preg_match('/^[a-z A-Z]+[, . a-z A-Z 0-9 \x20]* $/i',$x)){
                        $result['status']='false';
                        $result['message']='Description should consist of alphabets and digits.';
                        return $result;
                    }          
        }
        $result['status']='true';
        return $result;
    }

?>