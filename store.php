<?php
// including $products array to this file
include "./stock.php";

// prepare array for the chosen items by user
$selectedItems = [];

// check if $_GET array has any element!
if (sizeof($_GET) > 0) {
    for($i = 0; $i < sizeof($products); $i++){
        if (isset($_GET["prod-id"]) &&  $_GET["prod-id"] === $products[$i]["id"]) {
            // Reference: http://php.net/manual/en/function.array-push.php
            array_push($selectedItems, $products[$i]);
        }
    }
}  
//declare a variable that will store initial value for markup
$markup = NULL;

// check if the number of elements is greater than 0
if (sizeof($selectedItems) > 0) {  
    // create markup and populate the markup with data 
    // loop through $selectedItems
    for($a = 0; $a < sizeof($selectedItems); $a++) {
        $markup .= "<div class=\"col-12 col-sm-6 col-lg-3 \">
                        <div class=\"store\">
                            <figure>
                                <img src=\"{$selectedItems[$a]["thumbnail"]}\" alt=\"{$selectedItems[$a]["type"]}\">
                                <figcaption>
                                    <ul>
                                        <li>{$selectedItems[$a]["type"]}</li>
                                        <li>{$selectedItems[$a]["price"]}</li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                    </div>";
    }    
} else { 
    // do the same as in if-block, only difference is 
    // that you are going to loop through $products
   
    for($b = 0; $b < sizeof($products); $b++) {
        $markup .= "<div class=\"col-12 col-sm-6 col-lg-3 \">
                        <div class=\"store\">
                            <figure>
                                <img src=\"{$products[$b]["thumbnail"]}\" alt=\"{$products[$b]["type"]}\">
                                <figcaption>
                                    <ul>
                                        <li>{$products[$b]["type"]}</li>
                                        <li>{$products[$b]["price"]}</li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>
                    </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        
       <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Josefin+Slab" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
       <div class="wrapper">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1>
                           ANNABELLE
                        </h1>
                    </div>
                </div>
            </div>
            <!-- <navigation> -->
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand logo" href="#">AB</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav  bar">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Store
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./store.php?prod-id=app">Outfit</a>
                                    <a class="dropdown-item" href="./store.php?prod-id=entree">Shoes</a>
                                    <a class="dropdown-item" href="./store.php?prod-id=dessert">Accessories</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div> 
        </header>
 <!-- <navigation ends> -->
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 masthead">
                        <img alt="Bootstrap Image Preview" src="./img/1.jpg" / class="headimg">
                        <hr>
                        
                        <h3>
                            New Arrivals
                        </h3>
                        
                    </div>
                </div>
            </div>

        <main>
            <div class="row">
               
                        <?php
                             if(isset($markup)){
                            echo $markup;
                            }
                         ?>
            </div>
        </main>   
                 
        <div class="col-md-12 button">
          <button type="button" class="btn">
            View All
          </button>
        </div>
        
        <footer>
            <div class="row">
                <div class="col-md-6">

                    <address>
                        <strong>Annabelle, Inc.</strong><br /> 666 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-md-6 icon">
                    <a href="http://www.facebook.com" class="fa fa-facebook"></a>
                    <a href="http://www.twitter.com" class="fa fa-twitter"></a>
                    <a href="http://www.google.com" class="fa fa-google"></a>
                </div>
            </div>
        </footer>
        </div>
        
        <!-- Bootstrap core JavaScript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- <end> -->
    </body>
</html>