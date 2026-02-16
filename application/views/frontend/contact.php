<?php include "css.php"; ?>


<!--Wrapper Start-->  
<div class="ct_wrapper">
	
    <?php include "headerwrap.php"; ?>
        
    <?php include "navigationwrap.php"; ?>

    </header>
    <!--Header Wrap End-->
    
    <!--Banner Wrap Start-->
    <section class="sub_banner_wrap">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="sub_banner_hdg">
                    	<h3>Contact Us</h3>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="ct_breadcrumb">
                    	<ul>
                        	<li><a href="<?php echo base_url()?>website">Home</a></li>
                            <li><a href="<?php echo base_url()?>website/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Wrap End-->
    
    <!--Content Wrap Start-->
    <div class="ct_content_wrap">
        <!--Map Wrap Start-->
        <div class="map-canvas gt_contact_us_map" id="map-canvas"></div>
        <!--Map Wrap End-->
        
        <!--Get in Touch With Us Wrap Start-->
        <section>
        	<div class="container">
            	<div class="get_touch_wrap">
                	<h4>GET IN TOUCH WITH US:</h4>
                    <p>We are home to 1,500 students (aged 12 to 16) and 100 expert faculty and staff community representing over 40 different nations. We are proud of our international and multi-cultural ethos, the way our community collaborates to make a difference. Our world-renowned curriculum is built on the best.</p>
                </div>
                <div class="row">
                	<div class="col-md-6">
                    	<div class="ct_contact_form">
                        	<form>
                            	<div class="form_field">
                                	<label class="fa fa-user"></label>
                                	<input class="conatct_plchldr" type="text" placeholder="Your Name">
                                </div>
                                <div class="form_field">
                                	<label class="fa fa-envelope-o"></label>
                                	<input class="conatct_plchldr" type="text" placeholder="Email Address">
                                </div>
                                <div class="form_field">
                                	<label class="fa fa-edit"></label>
                                	<textarea class="conatct_plchldr" placeholder="Write Detail"></textarea>
                                </div>
                                <div class="form_field">
                                	<button>Send Now <i class="fa fa-arrow-right"></i> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
						<div class="bottom_border">
							<div class="row">
								<div class="col-md-6">
									<div class="ct_contact_address">
										<h5><i class="fa fa-map-o"></i>Address</h5>
										<p>1052 Boone Crockett Lane Sedro Woolley, WA Newyork 98284</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="ct_contact_address">
										<h5><i class="fa fa-envelope-o"></i>Fax & Email</h5>
										<ul class="fax_info">
											<li>0011-360-4296-692</li>
											<li>0011-360-4296-692</li>
										</ul>
										<p>educare@gmail.com</p>
									</div>
								</div>
							</div>
						</div>
						
                        <div class="newletter_des contact_us_newsltr">
                            <h5>Subscribe Our Weekly Newsletter</h5>
                            <form>
                                <label class="fa fa-envelope-o"></label>
                                <input type="text" placeholder="Enter Your Email">
                                <button>Signup</button>
                            </form>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--Get in Touch With Us Wrap End-->
        
        
    </div>
    <!--Content Wrap End-->
    
    <?php include "footer.php"; ?>
        
</div>
<!--Wrapper End-->



<?php include "javascript.php"; ?>

  </body>
</html>
