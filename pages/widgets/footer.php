<?php
function footer_bar($developer)
{
    echo <<<EOT
         <footer class="footer ">
        <div class="container">
            <p>Copyright &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by <a href="https://github.com/diwacreation3">$developer</a> | All Rights Reserved</p>
            <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </div>
    </footer>

    EOT;
}

function home_footer_bar($developer)
{
    echo <<<EOT
         <footer class="footer ">
        <div class="container">
            <p>Copyright &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by <a href="https://github.com/diwacreation3">$developer</a> | All Rights Reserved</p>
            <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </div>
    </footer>

    EOT;
}
?>
