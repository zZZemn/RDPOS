<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
    
<main>
<?php
include("backend/session.php");
include("backend/back_navbar.php");

include "controller/function/count.php";
include "controller/function/session_Dir.php";

include "view/product/function.php";
?>   
            
            <div class="container mt-3">
                
                <br><br><br>
                           <?php include "view/home/searchArea.php"; ?>
            
            <div style="position:fixed; z-index: 9999;" id="suggestionsContainer"></div>
            <div class="slider-with-banner ml-0" >
                
              
                    <div class="row w-100" >
                          <!-- Begin Slider Area -->
                         
                          <?php include "view/home/TopsliderSection.php";?>
                         
                    </div>
                      
               
              </div>
                   
                          <?php include "view/home/newArrivalSection.php"; ?>
                          <?php include "view/home/productSection.php";?>
                          <?php include "view/home/VoucherBannerSeaction.php";?>
                  
              
                     
                            <div class="row">
                                <?php include "view/product/section.php";?>
                                
                            </div>
                            
</main>