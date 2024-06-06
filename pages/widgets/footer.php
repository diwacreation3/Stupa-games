<?php
function footer_bar($developer)
{
    echo <<<EOT
        <footer class="footer fixed-bottom ">
         <p class="footer-detail"> &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by $developer </p>
         <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </footer>

    EOT;
}

function index_footer_bar($developer)
{
    echo <<<EOT
        <footer class="footer ">
         <p class="footer-detail"> &copy <span id = "getCurrentYear"> </span>  | Developed with &#10084; by $developer  </p>
         <script> document.getElementById("getCurrentYear").innerHTML = new Date().getFullYear(); </script>
        </footer>
        EOT;
}
?>
