<!--Content Wrap Start-->
    <div class="ct_content_wrap">
        <!--Get Started Wrap Start-->
        <section>
        	<div class="container">
            	<div class="get_started_outer_wrap">
            		<div class="row">
                        <div class="col-md-6">
                            <div class="get_started_content_wrap ct_blog_detail_des_list">
                                <h3>Like what you’re learning GET STARTED TODAY!</h3>
                                <p>We are home to 1,500 students (aged 12 to 16) and 100 expert faculty and staff  community representing over 40 different nations. We are proud of our international and multi-cultural ethos, the way our community collaborates to make a difference. Our world-renowned curriculum is built on the best.</p>
                                <p>Global and US standards.We are home to 1,500 students (aged 12 to 16) and 100 expert faculty and staff.Community representing over 40 different nations. We are proud of our international.</p>
								<p><a href="#" style="color:grey">Learn More&nbsp;<i class="fa fa-arrow-right"></i></a></p>
                               
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="get_started_video">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=552%C3%97476&w=552&h=476" alt="">
                                <div class="get_video_icon">
                                    <a data-rel="prettyPhoto" href="http://www.youtube.com/watch?v=kh29_SERH0Y?rel=0"><i class="fa fa-play"></i></a>
                                    <span>Watch The Video</span>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
                
                <div class="row">
                	<div class="col-md-4 col-sm-6">
                    	<div class="get_started_services">
                        	<div class="get_started_icon">
                            	<i class="fa fa-paper-plane-o"></i>
                            </div>
                            <div class="get_icon_des">
                            	<h5>Our Mission</h5>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                    	<div class="get_started_services">
                        	<div class="get_started_icon">
                            	<i class="fa fa-bookmark-o"></i>
                            </div>
                            <div class="get_icon_des">
                            	<h5>Our Vision</h5>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                    	<div class="get_started_services">
                        	<div class="get_started_icon">
                            	<i class="fa fa-television"></i>
                            </div>
                            <div class="get_icon_des">
                            	<h5>Our Goal</h5>
                                <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                                <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!--Get Started Wrap End-->
        
        <!--Courses By Subject Wrap Start-->
        <section class="ct_courses_subject_bg">
        	<div class="container">
            	<!--Heading Style 1 Wrap Start-->
                <div class="ct_heading_1_wrap ct_white_hdg">
                	<h3><?php echo get_phrase('Our School Subjects') ?></h3>
                    <span><img src="<?php echo base_url();?>frontend/images/hdg-01.png" alt=""></span>
                </div>
                <!--Heading Style 1 Wrap End-->
                
                <!--Courses Subject List Wrap Start-->
                <div class="courses_subject_carousel owl-carousel">
                <?php $select_all_subjects = $this->db->get('subject')->result_array();
                      foreach($select_all_subjects as $key => $all_subjects_seleceted):?>	
                <div class="item">
                        <div class="course_subject_wrap ct_bg_1">
                            <i class="fa fa-area-chart"></i>
                            <div class="course_subject_des">
                                <p><span><?php echo $all_subjects_seleceted['name'] ;?> </span> <?php echo $this->db->get_where('class', array('class_id' => $all_subjects_seleceted['class_id']))->row()->name; ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    
                    
                </div>
                <!--Courses Subject List Wrap End-->
            </div>
        </section>
        <!--Courses By Subject Wrap End-->
        
       
        
        <!--Testimonial Wrap Start-->
        <section class="ct_testimonial_bg">
        	<div class="container">
            	<!--Heading Style 1 Wrap Start-->
                <div class="ct_heading_1_wrap ct_white_hdg">
                	<h3>Testimonials</h3>
                    <p>Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consec <br/>tetuer adipis elit, aliquam eget nibh etlibura.</p>
                    <span><img src="<?php echo base_url();?>frontend/images/hdg-01.png" alt=""></span>
                </div>
                <!--Heading Style 1 Wrap End-->
                
                <!--Testimonial List Wrap Start-->
                <div class="testimonial_carousel owl-carousel">
                	<div class="item">
                    	<div class="testimonial_wrap">
                        	<figure>
                            	<img src="https://placeholdit.imgix.net/~text?txtsize=16&txt=86%C3%9786&w=86&h=86" alt="">
                            </figure>
                            <p>They exceeded my expectations and did so with professionalism and integrity. They are organized, intelligent, efficient and keep up to date. with the ever changing world of SEO. 
I highly recommend them."</p>
						<span><b>Fiona Lara</b>, DY Physics</span>
                        </div>
                    </div>
                    <div class="item">
                    	<div class="testimonial_wrap">
                        	<figure>
                            	<img src="https://placeholdit.imgix.net/~text?txtsize=16&txt=86%C3%9786&w=86&h=86" alt="">
                            </figure>
                            <p>They exceeded my expectations and did so with professionalism and integrity. They are organized, intelligent, efficient and keep up to date. with the ever changing world of SEO. 
I highly recommend them."</p>
						<span><b>Fiona Lara</b>, DY Physics</span>
                        </div>
                    </div>
                    <div class="item">
                    	<div class="testimonial_wrap">
                        	<figure>
                            	<img src="https://placeholdit.imgix.net/~text?txtsize=16&txt=86%C3%9786&w=86&h=86" alt="">
                            </figure>
                            <p>They exceeded my expectations and did so with professionalism and integrity. They are organized, intelligent, efficient and keep up to date. with the ever changing world of SEO. 
I highly recommend them."</p>
						<span><b>Fiona Lara</b>, DY Physics</span>
                        </div>
                    </div>
                    <div class="item">
                    	<div class="testimonial_wrap">
                        	<figure>
                            	<img src="https://placeholdit.imgix.net/~text?txtsize=16&txt=86%C3%9786&w=86&h=86" alt="">
                            </figure>
                            <p>They exceeded my expectations and did so with professionalism and integrity. They are organized, intelligent, efficient and keep up to date. with the ever changing world of SEO. 
I highly recommend them."</p>
						<span><b>Fiona Lara</b>, DY Physics</span>
                        </div>
                    </div>
                </div>
                <!--Testimonial List Wrap End-->
                
            </div>
        </section>
        <!--Testimonial Wrap End-->
     
        
       <!--Figures & Facts Wrap Start-->
        <section class="ct_facts_bg">
		
            <ul>
                <li>
				
                    <i class="icon-avatar" style="color:#e625ea"></i>
                    <h2 class="counter" style="color:#e625ea"> <?php echo $this->db->get('teacher')->num_rows(); ?> </h2>
                    <span style="color:#e625ea">Certified Teachers</span>
                </li>
                <li>
                    <i class="icon-command" style="color:#8226f5"></i>
                    <h2 class="counter" style="color:#8226f5"> <?php echo $this->db->get('student')->num_rows(); ?> </h2>
                    <span style="color:#8226f5">Students Enrolled</span>
                </li>
                <li>
                    <i class="icon-open-book"  style="color:#e625ea"></i>
                    <h2 class="counter"  style="color:#e625ea"> <?php echo $this->db->get('alumni')->num_rows(); ?> </h2>
                    <span style="color:#e625ea">Passing to Universities</span>
                </li>
                <li>
                    <i class="icon-pulse" style="color:#8226f5"></i>
                    <h2 class="counter" style="color:#8226f5"> <?php echo $this->db->get('parent')->num_rows(); ?> </h2>
                    <span style="color:#8226f5">Satisfied Parents</span>
                </li>
            </ul>
        </section>
        <!--Figures & Facts Wrap End-->
    </div>
    <!--Content Wrap End-->