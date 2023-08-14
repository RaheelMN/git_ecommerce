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
                    $result['error']=true;
                    $result['message']='Name should be less than '.$length.' characters';  
                    return $result;                  

                }elseif(!preg_match('/^[a-zA-Z]+[ a-zA-Z0-9]*$/i',$x)){
                    $result['error']=true;
                    $result['message']='Name should consist of alphabets and digits';
                    return $result;
                }else{
                    $result['error']=false;
                    return $result;
                } 
                break; 

            case "desc":
                if(strlen($x)>$length){
                    $result['error']=true;
                    $result['message']='Description should be less than '.$length.' characters';  
                    return $result;                  

                }elseif(!preg_match('/^[a-zA-Z]+[ ,.%+\-\(\)\'&a-zA-Z0-9]*$/i',$x)){
                    $result['error']=true;
                    $result['message']='Description should consist of alphabets and digits.';
                    return $result;
                }else{
                    $result['error']=false;
                    return $result;
                }  
                break;  

                
            case "keyw":
                if(strlen($x)>$length){
                    $result['error']=true;
                    $result['message']='Keywords should be less than '.$length.' characters';  
                    return $result;                  

                }elseif(!preg_match('/^[a-zA-Z]+[ ,.a-zA-Z0-9]*$/i',$x)){
                    $result['error']=true;
                    $result['message']='Keywords should consist of alphabets and digits.';
                    return $result;
                }else{
                    $result['error']=false;
                    return $result;
                }   
                break; 
                
            case "image":
                $allow_types = array('jpg','png','jpeg','gif','pdf');
                $file_type = pathinfo($x,PATHINFO_EXTENSION);
                if(!in_array($file_type,$allow_types)){
                    $result['error']=true;
                    $result['message']='Image datatype should be jpg,png,jpeg,gif,pdf'; 
                    return $result;
                }else{
                    $result['error']=false;
                    return $result;                
                }
                break;

            case "price":
                if($x<=0 || $x>100000){
                    $result['error']=true;
                    $result['message']='Price should be between 0 and 100000';  
                    return $result;                  
                }else{
                    $result['error']=false;
                    return $result;
                } 
                break; 
        }

    }

?>