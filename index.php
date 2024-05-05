<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cook Booker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
  
</head>
<body>
        <!--navigation bar-->
        <nav class="navbar navbar-dark bg-dark navbar-expand-xl fixed-top">
            <a href="" class="navbar-brand">Coock Booker</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#cc"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse collapse-horizontal" id="cc">
            <ul class="nav-fill nav-pills navbar-nav nav">
                <li><span class="active"><a href="a">Home</a></span></li>
                <li><a href="a">Recipes</a></li>
                <li><a href="a">About us</a></li>
                <li><a href="a">Donation</a></li>
                <?php
                    if(isset($_SESSION['name'])){
                        echo '<li><a class="log" href="/Online_Recipe_Management_System/user">'. $_SESSION['name']. '</a></li>';
                    }
                    else {
                        echo '<li><a class="log" href="/Garment-management-system/login">Sign in</a></li>';
                    }
                ?>
                
                
            </ul>
            <form class="d-flex" role="search">
                <input type="search" placeholder="Search" aria-label="Search">
                <button type="submit">Search</button>
              </form>
           
        </nav>
        <!--about section-->
        <div class="about">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 ">
                    <div class="text">
                        <h1>Lorem ipsum dolor sit amet consectetur
                        <br>adipisicing</h1>
                        <h3 class="lead">Lorem ipsum dolor sit amet consectetur a sit amet consectetur<br>
                            Pariatur repudiandae architecto provident  <br>
                            Itaque nulla, aliquam voluptatibus aliquid sit amet consectetur<br>
                            sunt delectus obcaecati perspiciatis fugit <br>
                            Pariatur repudiandae architecto provident sit amet consectetur<br>
                            Itaque nulla, aliquam voluptatibus.</h3>
                        <a class="button" href="a">Recipes</a>
                    </div>
                </div>
            </div>
        </div>
        <!--popular collections-->
        <section class="pop">
            <div class="container">
                <h2><b>Popular Collection</b></h2>
                <div class="item">
                    <div class="line1">
                        <ul>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                        </ul>    
                    </div>
                    <div class="line2">
                        <ul>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                            <li><img src="images/Pepperoni-Pizza-Recipe-Sip-Bite-Go.jpg"></li>
                        </ul>
                    </div>
                </div>  
             </div>
        </section>
        <!--recent recipes-->
        <section class="recent">
            <div class="container">
                <h1>Learn Cooking Online!</h1>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                    <div class="col">
                        <div class="card">
                            <img src="images/1041.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">TIRAMISU CAKE</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                    dignissimos accusantium amet similique velit iste.</p>
                            </div>
                            <div class="mb-5 d-flex justify-content-around">
                                <h3>190$</h3>
                                <button class="btn btn-primary">Read</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="images/1041.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">TIRAMISU CAKE</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                    dignissimos accusantium amet similique velit iste.</p>
                            </div>
                            <div class="mb-5 d-flex justify-content-around">
                                <h3>190$</h3>
                                <button class="btn btn-primary">Read</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="images/1041.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">TIRAMISU CAKE</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                    dignissimos accusantium amet similique velit iste.</p>
                            </div>
                            <div class="mb-5 d-flex justify-content-around">
                                <h3>190$</h3>
                                <button class="btn btn-primary">Read</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="images/1041.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">TIRAMISU CAKE</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                                    dignissimos accusantium amet similique velit iste.</p>
                            </div>
                            <div class="mb-5 d-flex justify-content-around">
                                <h3>190$</h3>
                                <button class="btn btn-primary">Read</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <footer>
            <div class="container">
                <div class="footer-content">
                    <h3>Contact Us</h3>
                    <p>Email:Info@example.com</p>
                    <p>Phone:+121 56556 565556</p>
                    <p>Address:Your Address 123 street</p>
                </div>
                <div class="footer-content">
                    <h3>Quick Links</h3>
                     <ul class="list">
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Services</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">Contact</a></li>
                     </ul>
                </div>
                <div class="footer-content">
                    <h3>Follow Us</h3>
                    <ul class="social-icons">
                     <li><a href=""><i class="fab fa-facebook"></i></a></li>
                     <li><a href=""><i class="fab fa-twitter"></i></a></li>
                     <li><a href=""><i class="fab fa-instagram"></i></a></li>
                     <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                    </div>
            </div>
            <div class="bottom-bar">
                <p>&copy; 2023 coockbooker . All rights reserved</p>
            </div>
        </footer>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
       
</body>
</html>