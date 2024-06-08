<?php
function footer_bar($developer)
{
    echo <<<EOT
         <footer class="footer fixed-bottom">
        <div class="container">
            <p>Copyright &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by <a href="https://github.com/diwacreation3">diwacreation3</a> | All Rights Reserved</p>
            <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </div>
    </footer>

    EOT;
}

function index_footer_bar($developer)
{
    echo <<<EOT
        <footer class="footer  ">
         <p class="footer-detail"> &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by $developer  </p>
         <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </footer>
        EOT;
}
?>
