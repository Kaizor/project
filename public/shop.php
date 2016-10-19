<?php
require_once 'config.php';
require_once  '../resources/config.php';
?>

<body class="nav-sm">
<div class="container body">
    <div class="main_container">

        <?php
        $_SESSION['admission_number'] = 1;
        include 'includes/menu/sidemenu.php';
        include 'includes/menu/topmenu.php';
        ?>

        <div class="right_col" role="main"">
            <!-- page content -->
            <?php
                echo '<div class="container-fluid">
                           <div class="search--container">                                    
                              <input class="search" type="search" id="search"  />
                              <button class="search"><i class="fa fa-search"></i> Search</button>
                           </div>
                           <div class="sort--container">
                              <label for="sort">Sort By</label>
                              <select class="sort" id="sort"><option>Recently Added</option></select>
                           </div>    
                           
                           <div class="wrapper product">
                               <div class="ribbon"><span>Featured</span></div>                               
                               <div class="image-warp">  
                                <img class="product-img" src="'. IMG_PATH . "/ticket.jpg" .'" />
                               </div>
                               <hr>
                               
                                <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> Prom Tickets </div>
                                  <span class="label label-primary product-price">1000 POINTS</span>
                                  <span class="label label-success product-quanitiy">UNLIMITED</span>
                              </div>
                              <hr>
                                  
                                <div class="product-btn--wrap">                                    
                                  <button id="addToCart" class="btn btn-success btn--product"><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button id="quantityPlus" class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button id="quantityMinus" class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                                                                  
                                                            
                            </div>  
                                 
                            <div class="wrapper product">                              
                              <div class="image-warp" >  
                                <img class="product-img" src="'. IMG_PATH . "/football.png" .'" />
                              </div>
                              <hr>
                              
                              <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> Football </div>
                                  <span class="label label-primary product-price">300 POINTS</span>
                                  <span class="label label-warning product-quanitiy">3 LEFT</span>
                              </div>
                              <hr>
                                  
                              <div class="product-btn--wrap">                                    
                                  <button class="btn btn-success btn--product"><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                              
                            </div>  
                            
                            <div class="wrapper product">
                                <div class="ribbon--red"><span>Sold Out!</span></div>
                              <div class="image-warp imghover" >  
                                <img class="product-img" src="assets/images/tennis-ball.jpg" />
                               </div>
                              <hr>
                              
                               <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> Tennis Ball </div>
                                  <span class="label label-primary product-price">150 POINTS</span>
                                  <span class="label label-warning product-quanitiy hidden">0 LEFT</span>
                              </div>
                              <hr>
                                  
                              <div class="product-btn--wrap">                                    
                                  <button class="btn btn-success btn--product" disabled><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                              
                            </div>  
                               
                           
                            <div class="wrapper product">                               
                              <div class="image-warp" >  
                                <img class="product-img" src="assets/images/ps4.png" />
                               </div>
                              <hr>
                              
                               <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> PS4 Game </div>
                                  <span class="label label-primary product-price">1500 POINTS</span>
                                  <span class="label label-danger product-quantity">1 LEFT</span>
                              </div>
                              <hr>
                                  
                              <div class="product-btn--wrap">                                    
                                  <button class="btn btn-success btn--product"><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                              
                            </div>
                            
                            <div class="wrapper product">                               
                              <div class="image-warp" >  
                                <img class="product-img" src="assets/images/xbox.png" />
                               </div>
                              <hr>
                              
                               <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> Xbox Game </div>
                                  <span class="label label-primary product-price">1500 POINTS</span>
                                  <span class="label label-danger product-quantity">1 LEFT</span>
                              </div>
                              <hr>
                                  
                              <div class="product-btn--wrap">                                    
                                  <button class="btn btn-success btn--product"><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                              
                            </div> 
                            
                            
                       </div>';
            ?>
            <!-- /page content -->


            <!-- footer content -->
            <?php
            require_once 'includes/footer.php';
            ?>
            <!-- /footer content -->
        </div>

    </div>
</div>

</body>
</html>