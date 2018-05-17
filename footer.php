<?php

// return the HTML code needed to produce 
// 1. footer(copyright) section of the webpage
// 2. closing tages for elements opened (but not closed) in the header.php file

function footer(){
    
$year = date("Y");
    
echo
"
    <footer>
    <p>&copy; $year CST8285. All Rights Reserved.</p>
    </footer>
    </div><!-- End Wrapper -->
    </body>
    </html>
";
}

footer();

?>