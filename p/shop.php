<?php
require_once 'config.php';
require_once  '../../resources/config.php';
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
                           </div>';

                $query = $DB->DB__Query('SELECT * FROM product WHERE ShowProduct = 1');
                $result = $DB->DB__fetch_array($query);
                    foreach($result as $item){
                        switch($item['Quantity']){
                            case 1:
                                $labelType = 'label-danger';
                                break;
                            case 1-5:
                                $labelType = 'label-warning';
                                break;
                            default:
                                $labelType = 'label-success';
                                break;
                        }


                        echo  '<div class="wrapper product"> ' .
                               ($item['Featured'] == 1 ? '<div class="ribbon"><span>Featured</span></div>' : '') .
                               ($item['Quantity'] == 0 ? '<div class="ribbon--red"><span>Sold Out!</span></div>' : '') .
                              '<div class="image-warp" >  
                                <img class="product-img" src="'. IMG_PATH . "/" . $item['image'] .'" />
                              </div>
                              <hr>
                              
                              <div class="product--info">
                                  <div style="font-size: 20px;font-weight: 700;"> ' . $item['Name'] . ' </div>
                                  <span class="label label-primary product-price">' . $item['Cost'] . ' POINTS</span>
                                  ' . ($item['Quantity'] == 0 ? '' : '<span class="label ' . $labelType . ' product-quantity">' . $item['Quantity'] . ' LEFT</span>') . '
                              </div>
                              <hr>
                                  
                              <div class="product-btn--wrap">                                    
                                  <button class="btn btn-success btn--product" ' . ($item['Quantity'] == 0 ? 'disabled=true' : '') . '><i class="fa fa-plus-circle"></i> Add to Cart </button>
                                   
                                    <div class="product-quantity hidden">
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-plus-circle"></i></button>
                                        <span>1</span>
                                     <button class="btn btn-sm btn-success btn--product"><i class="fa fa-minus-circle"></i></button>
                                    </div>                                                      
                                   
                              </div>                              
                            </div>';
                    }

                            
                   echo '</div>';
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