<?php
require "_paths.php";

if(!is_dir($data_path))
{   
    // directory logic 
    $_user_path = $username;

    $_data_user_path = "../{$data_path}/$_user_path";
    if(!file_exists( $_data_user_path))
    {
       mkdir($_data_user_path,0777, true); 
    }
    $_user_img_path = "{$_data_user_path}/{$_img_path}";

    if(!file_exists($_user_img_path))
    {
        mkdir($_user_img_path, 0777, true);
    }

    $_user_binary_path = "{$_data_user_path}/{$_binary_path}";
    if(!file_exists($_user_binary_path))
    {
        mkdir($_user_binary_path, 0777, true);
    }

    // $_create_img_path = "../{$data_path}/ {$_user_path}/ {$_img}  ";
    // $_create_binary_path = "../{$data_path}/{$_user_path}/{$_binary} /{$_img}";
    
    // if($_create_binary_path)
    // {
    //     mkdir($_create_binary_path  , 0777, true);  
    //     // mkdir($_create_img_path, 0777, true);
    // }
   
    
    

}

?>