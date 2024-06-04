<?php
// check platform name and return icon according to it 
function check_platform($platform)
{
        
        switch ($platform) {
        case "windows":
           echo <<<EOT
         <i class = "bi bi-windows"></i> 
        EOT;
            break;
        case "android":
            echo <<<EOT
        <i class =  "bi bi-phone"></i>
        EOT;
            break;
        case "web":
            echo <<<EOT
        <i class = "bi bi-globe"></i>
        EOT;
            break;
        default:
            echo "Unable to Fetch_platform";
            break;
    }


}
