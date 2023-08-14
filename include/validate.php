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

                case "email":
                    if(strlen($x)>$length){
                        $result['error']=true;
                        $result['message']='Email should be less then '.$length.' characters';  
                        return $result;                  
    
                    }elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$x)){
                        $result['error']=true;
                        $result['message']='Email not valid';
                        return $result;
                    }else{
                        $result['error']=false;
                        return $result;
                    }   
                    break;    
                    
                case "password":
                    if(strlen($x)>$length || (strlen($x) < 6)){
                        $result['error']=true;
                        $result['message']="Password should be between 6 to 12 characters";  
                        return $result;                  
    
                    }elseif(!preg_match("/^[\D\d\W]{6,12}$/i",$x) || !preg_match("/^[^<>]+$/i",$x) ){
                        $result['error']=true;
                        $result['message']='Password not valid';
                        return $result;
                    }else{
                        $result['error']=false;
                        return $result;
                    }   
                    break;                    

                    case "address":
                        if(strlen($x)>$length){
                            $result['error']=true;
                            $result['message']='Address should be less then '.$length.' characters';  
                            return $result;                  
        
                        }elseif(!preg_match('/^[a-zA-Z]+[ ,.\#+\-\/\'&a-zA-Z0-9]*$/i',$x)){
                            $result['error']=true;
                            $result['message']='Address characters not valid';
                            return $result;
                        }else{
                            $result['error']=false;
                            return $result;
                        }  
                        break;    
                        
                    case "phone":
                        if(!preg_match('/^[0-9]{11,11}$/i',$x)){
                            $result['error']=true;
                            $result['message']='Phone number should be eleven digits long';
                            return $result;
                        }else{
                            $result['error']=false;
                            return $result;
                        }  
                        break;                          
        }

    }

?>