<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
                <div class="panel-body table-responsive">

                            <section class="m-t-40">
                                <div class="sttabs tabs-style-linetriangle">
                                    <nav>
                                        <ul>
                                            <li><a href="#section-linetriangle-1"><span><?php echo get_phrase('General Settings') ;?></span></a></li>
                                            <li><a href="#section-linetriangle-2"><span><?php echo get_phrase('Upload Banner') ;?></span></a></li>
                                            <li><a href="#section-linetriangle-3"><span><?php echo get_phrase('Testimonies') ;?></span></a></li>
                                            <li><a href="#section-linetriangle-4"><span><?php echo get_phrase('Subscriber') ;?></span></a></li>
                                            <li><a href="#section-linetriangle-5"><span><?php echo get_phrase('Contact Us') ;?></span></a></li>
                                        </ul>
                                    </nav>
                                    <div class="content-wrap">
                                        <section id="section-linetriangle-1">
                                            <?php echo form_open(base_url() . 'admin/websiteSetting/save_generalSetting' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('About Us');?></label>
                    <div class="col-sm-12">
                                    <textarea id="mymce" name="about_us"></textarea>
                                </div>
                            </div>

								<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Video Link');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="video_link"></textarea>
                                </div>
                            </div>

                    
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Mission');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="mission"></textarea>
                                </div>
                            </div>


                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Vision');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="vision"></textarea>
                                </div>
                            </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Goal');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="goal"></textarea>
                                </div>
                            </div>

                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Testimony Message');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="testimony_message"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Mapcode');?></label>
                    <div class="col-sm-12">
                                    <textarea class="form-control" name="mapcode"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('save');?></button>
					</div>

                                <?php echo form_close();?>
                                        </section>
                                        <section id="section-linetriangle-2">
                                            <h2>Tabbing 2</h2></section>
                                        <section id="section-linetriangle-3">
                                            <h2>Tabbing 3</h2></section>
                                        <section id="section-linetriangle-4">
                                            <h2>Tabbing 4</h2></section>
                                        <section id="section-linetriangle-5">
                                            <h2>Tabbing 5</h2></section>
                                    </div>
                                    <!-- /content -->
                                </div>
                                <!-- /tabs -->
                            </section>
            </div>
        </div>
    </div>
</div>
