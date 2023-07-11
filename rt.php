<?php 
session_start();
include ('../../database/db.php');
include ('../../functions/testmessage.php');
if(!isset($_SESSION['mother'])){
  header('Location: ../../forms/options.php');}

if(isset($_SESSION['mother_id'])){
  $user_id= $_SESSION['mother_id'];
  $sql="SELECT *  from  `mother` where `mother_id` ='$user_id'";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
$mothrecity= $row['city']; 

  //select doctor with same region join `schedule` on doctor.doc_id=schedule.doc_sch order by schedule.day"
 $selcetre="SELECT * FROM `doctor` where doctor.city= '$mothrecity' and doctor.status='approved'"  ;
$run_re= mysqli_query($conn,$selcetre);


//select the rest  doctor
testmeseage($run_re,"mother");
$selcet="SELECT * FROM `doctor` where doctor.city= '$mothrecity' and doctor.status='approved'  ";
$run= mysqli_query($conn,$selcet);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>services providers</title>
    <link rel="stylesheet" href="doc.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    
</head>
<body>
    <div class="container text-center"  >
        <form class="d-flex" role="search" style="padding:10px 140px 10px 140px;">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" style="background-color:#3D405B;color: white; border: none;" ><i class="bi bi-search"></i></button>
          </form>
      
        <div class="row" >
            <div class="col-2" style="background-color: #fff; background-image: url(./images/apa-woman.png); background-attachment: fixed; background-repeat:no-repeat; background-size: contain; border-radius: 15px;box-shadow: 5px -1px 8px 2px #ddd;">
                <h4 style="width: 90px; height: 60px; margin-top: 10px;"><i class="bi bi-sort-down"></i>Filter</h4>
                
                
                <div>
                    <h6 ><i class="bi bi-heart-pulse-fill" style="margin-right: 3px;"></i>Medical Provider:</h6>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        
                        <option value="1">Doctors</option>
                        <option value="2">clincal labs</option>
                        <option value="3">sonar 2D,3D</option>
                      </select>
                </div>
                <div>
                    <h6 ><i class="bi bi-gender-ambiguous"  style="margin-right: 3px;"></i>Doctor Gender:</h6>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        
                      </select>
                </div>
                <div>
                    <h6 ><i class="bi bi-globe" style="margin-right: 3px;"></i>City:</h6>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <optgroup label="Giza">
                            <option value="1">6 october </option>
                            <option value="2">El-Shiekh zaied </option>
                            <option value="3">Faisl</option>
                            <option value="3">Haram</option>
                            <option value="3">El-Dokki</option>
                        </optgroup>
                        <optgroup label="Cairo">
                            <option value="1">El-maady</option>
                            <option value="2">El-tagmoa</option>
                            <option value="3">Naser City</option>
                            <option value="3">El-Mokattam</option>
                        </optgroup>
                        
                      </select>
                </div>
                <div>
                    <h6 ><i class="bi bi-cash-stack" style="margin-right: 3px;"></i>Price:</h6>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        
                        <option value="1">from lower to higher</option>
                        <option value="2">from higher to lower</option>
                        
                      </select>
                </div>
                <button type="button" class="btn btn-light" style="background-color:#3D405B; color: white; margin-bottom: 10px;">Filter</button>
            </div>
            <div class="col-10">

                <!--start doctor  div-->
                
                 <?php foreach ($run_re as $data){ 
                                     $doctor_id= $data ['doc_id'];?> 
                <section class="events-section section-bg section-padding" id="section_4" style="margin-bottom: 20px;"  >
                    <div class="container">
                   
                        <div class="row">
    
                            <div class="col-lg-12 col-12">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">

                                    <li class="nav-item" style="display: inherit;"><a class="nav-link active" id="doctor-tab" data-toggle="pill" href="#doctor" role="tab" aria-controls="doctor" aria-selected="true">Doctors</a></li>       
                               </ul>
                               <div class="line"></div>
                            </div>
    
                <!--start doctor in the same region div-->

                            <div class="row custom-block custom-block-bg">
                               
    
                                <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">

                                    <!--doctor image-->
                                    
                                    <div class="custom-block-image-wrap">
                                        <a href="profile.html">
                                            <img src="../../uploads/docimg/<?php echo $data['docimg']?>" class="custom-block-image img-fluid" alt="">
    
                                            <i class="custom-block-icon bi bi-person-lines-fill"></i>
                                            
                                        </a>
                                    </div>
                                </div>
    
                                <div class="col-lg-6 col-12 order-3 order-lg-0" style="width: 42%;">
                                    <div class="custom-block-info mt-2 mt-lg-0">
                                        <!--doctor name-->
                                        <a href="event-detail.html" class="events-title mb-3"><?php echo $data['docname']?></a>
                                        <!--address or description-->
    
                                        <p class="mb-0"><?php echo $data['brief']?></p>
    
                                        <div class="d-flex flex-wrap border-top mt-4 pt-3">
    
                                            <div class="mb-4 mb-lg-0">
                                                <div class="d-flex flex-wrap align-items-center mb-1">
                                                    <span class="custom-block-span">Location:</span>
    
                                                    <p class="mb-0"><?php echo $data['city']?></p>
                                                </div>
    
                                                <div class="d-flex flex-wrap align-items-center">
                                                    <span class="custom-block-span">Price:</span>
    
                                                    <p class="mb-0"><?php echo $data['docprice'];?></p>
                                                </div>
                                                <div class="d-flex flex-wrap align-items-center rate">
                                                    
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                </div>


                                               
                                            </div>
    <!--
                                            <div class="d-flex align-items-center ms-lg-auto">
                                                <a href="event-detail.html" class="btn custom-btn">Book</a>
                                            </div>
                                            -->
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="col-2 slider" style="float:right">
                                    <div id="carouselExample" class="carousel slide">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <?php //select schedule 
                                             $try="SELECT * FROM `schedule` WHERE `doc_sch`=$doctor_id order by `day`";
                                             $run=mysqli_query($conn,$try);
                                           // testmeseage($run_sch,"schedule");
                                            foreach($run as $data) {?>
                                            <div class="booking-date-item">   <div class="booking-day-container"><div class="booking-item-day"><h1><?php echo $data ['day'];?></h1></div>
                                            </div>
                                            
                                              <div start="2023-04-18 10:00:00" end="2023-04-18 10:30:00" class="booking-item-time book-appointment "><h1><?php echo $data['from']." " .$data['from_status'];?></h1></div>
                                        
                                          </div>
                                          </div>
                                          
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" >
                                          <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #E07A5F;" ></span>
                                          <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" >
                                          <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #E07A5F;"></span>
                                          <span class="visually-hidden">Next</span>
                                        </button>
                                      </div>
                                  </div>
                            </div>
                            
    
                        </div>
                        
                    </div>
                    
                </section>
                <?php  } ?>
                                       </div><?php } ?>
                <div id="popup1" class="overlay">
                    <div class="popup">
                      <h2>Book Your Appointment</h2>
                      <a class="close" href="#">&times;</a>
                      <div class="content">
                        <div class="container d-flex justify-content-center mt-5 mb-5">

            

                            <div class="row g-3">
                
                              <div class="col-md-6">  
                                
                                <span>Payment Method</span>
                                <div class="card">
                
                                  <div class="accordion" id="accordionExample">
                                    
                                    
                
                                    <div class="card">
                                      <div class="card-header p-0">
                                        <h2 class="mb-0">
                                          <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="d-flex align-items-center justify-content-between">
                
                                              <span>Credit card</span>
                                              <div class="icons">
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                              </div>
                                              
                                            </div>
                                          </button>
                                        </h2>
                                      </div>
                
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body payment-card-body">
                                          
                                          <span class="font-weight-normal card-text">Card Number</span>
                                          <div class="input">
                
                                            <i class="fa fa-credit-card"></i>
                                            <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                                            
                                          </div> 
                
                                          <div class="row mt-3 mb-3">
                
                                            <div class="col-md-6">
                
                                              <span class="font-weight-normal card-text">Expiry Date</span>
                                              <div class="input">
                
                                                <i class="fa fa-calendar"></i>
                                                <input type="text" class="form-control" placeholder="MM/YY">
                                                
                                              </div> 
                                              
                                            </div>
                
                
                                            <div class="col-md-6">
                
                                              <span class="font-weight-normal card-text">CVC/CVV</span>
                                              <div class="input">
                
                                                <i class="fa fa-lock"></i>
                                                <input type="text" class="form-control" placeholder="000">
                                                
                                              </div> 
                                              
                                            </div>
                                            <div class="p-3">
                
                                                <button class="btn btn-primary btn-block free-button">Add card</button> 
                                               
                                                  
                                                </div>
                
                                          </div>
                
                                          <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                                         
                                        </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  
                                </div>
                
                              </div>
                
                              <div class="col-md-6">
                                  <span>Summary</span>
                
                                  <div class="card">
                
                                    <div class="d-flex justify-content-between p-3">
                
                                      <div class="d-flex flex-column">
                
                                        <span>Card Number: <i class="fa fa-caret-down"></i></span>
                                        
                                        
                                      </div>
                
                                      <div class="mt-1">
                                        <sup class="super-price">100093234234234</sup>
                                        
                                      </div>
                                      
                                    </div>
                
                                    <hr class="mt-0 line">
                
                                    <div class="p-3">
                
                                      <div class="d-flex justify-content-between mb-2">
                
                                        <span>CVV:</span>
                                        <span>1234</span>
                                        
                                      </div>
                
                                      <div class="d-flex justify-content-between">
                
                                        <span>Expiry Date: <i class="fa fa-clock-o"></i></span>
                                        <span>3/11</span>
                                        
                                      </div>
                                      
                
                                    </div>
                
                                    <hr class="mt-0 line">
                
                
                                    <div class="p-3 d-flex justify-content-between">
                
                                      <div class="d-flex flex-column">
                
                                        <span>Total Price:</span>
                                        
                                        
                                      </div>
                                      <span>100LE</span>
                
                                      
                
                                    </div>

                                    <small class="text-muted certificate-text">Cancellations made 7 days or more in advance of the event date, will receive a 100% refund, else will incur a 20% fee.</small>
                
                
                                    <div class="p-3">
                
                                    <button class="btn btn-primary btn-block free-button">confirm</button> 
                                   
                                      
                                    </div>
                
                
                
                                    
                                  </div>
                              </div>
                              
                            </div>
                            
                
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
           
          </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>