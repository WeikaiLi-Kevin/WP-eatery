<?php

    function headSection(){
    
    echo 
    "
        <!DOCTYPE html>
        <html>
        <head>
        <title>WP Eatery - Menu</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <link href='http://fonts.googleapis.com/css?family=Fugaz+One|Muli|Open+Sans:400,700,800' rel='stylesheet' type='text/css' />
        <link href=\"css/style.css\" rel=\"stylesheet\" type=\"text/css\">
        </head>
        <body>
        <div id=\"header\">
        </div>
        <div id=\"wrapper\">
    ";
    }
    
    function webPageHeader(){
    
    echo 
    "           
        <header class=\"clearfix\">
        <img src=\"images/header_img.jpg\" alt=\"Dining Room\" title=\"WP Eatery\"/>
        <div id=\"title\">
        <h1>WP Eatery</h1>
        <h2>1385 Woodroffe Ave, Ottawa ON</h2>
        <h2>Tel: (613)727-4723</h2>
        </div>
        </header>
    ";      
    }
    
    function navMenu(){
    
    echo 
    "
        <nav>
        <div id=\"menuItems\">
        <ul>
        <li><a href=\"index.php\">Home</a></li>
        <li><a href=\"menu.php\">Menu</a></li>
        <li><a href=\"contact.php\">Contact</a></li>
        <li><a href=\"userlogin.php\">List</a></li>
        </ul>
        </div>
        </nav>
    ";  
    }
    
    headSection();
    webPageHeader();
    navMenu();
   
?>