<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo 'Create New CBT Exam';?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form method="POST" action="<?php echo base_url(); ?>admin/cbt/save_exam" class="form-horizontal form-groups-bordered validate">
                        
                        <!-- ==================== BASIC INFO SECTION ==================== -->
                        <div class="panel panel-default m-t-20">
                            <div class="panel-heading bg-info text-white">
                                <strong><?php echo get_phrase('Basic Info');?></strong>
                            </div>
                            <div class="panel-body">
                                
                                <!-- Exam Title -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="exam_title"><?php echo get_phrase('Exam Title');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" 
                                               class="form-control" 
                                               id="exam_title" 
                                               name="exam_title" 
                                               placeholder="<?php echo get_phrase('Enter exam title');?>" 
                                               required>
                                        <small class="text-muted"><?php echo get_phrase('e.g., Mathematics Final Exam');?></small>
                                    </div>
                                </div>

                                <!-- Class Selection -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="class_id"><?php echo get_phrase('Class');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" 
                                                id="class_id" 
                                                name="class_id" 
                                                required
                                                onchange="return get_class_subject(this.value)">
                                            <option value=""><?php echo get_phrase('Select a class');?></option>
                                            <?php if (!empty($classes)): ?>
                                                <?php foreach ($classes as $class): ?>
                                                    <option value="<?php echo $class['class_id']; ?>"><?php echo html_escape($class['name']); ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Subject Selection -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="subject_id"><?php echo get_phrase('Subject');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" 
                                                id="subject_selector_holder" 
                                                name="subject_id" 
                                                required>
                                            <option value=""><?php echo get_phrase('Select a subject');?></option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ==================== EXAM SETTINGS SECTION ==================== -->
                        <div class="panel panel-default m-t-20">
                            <div class="panel-heading bg-info text-white">
                                <strong><?php echo get_phrase('Exam Settings');?></strong>
                            </div>
                            <div class="panel-body">
                                
                                <!-- Duration -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="duration"><?php echo get_phrase('Duration');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="number" 
                                                   class="form-control" 
                                                   id="duration" 
                                                   name="duration" 
                                                   placeholder="60" 
                                                   min="5" 
                                                   max="480" 
                                                   required>
                                            <span class="input-group-addon"><?php echo get_phrase('minutes');?></span>
                                        </div>
                                        <small class="text-muted"><?php echo get_phrase('How long should students have to complete this exam?');?></small>
                                    </div>
                                </div>

                                <!-- Instructions -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="instructions"><?php echo get_phrase('Instructions');?></label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" 
                                                  id="instructions" 
                                                  name="instructions" 
                                                  rows="5" 
                                                  placeholder="<?php echo get_phrase('Enter exam instructions for students');?>"></textarea>
                                        <small class="text-muted"><?php echo get_phrase('Provide any special instructions or guidelines for students taking this exam.');?></small>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ==================== AVAILABILITY WINDOW SECTION ==================== -->
                        <div class="panel panel-default m-t-20">
                            <div class="panel-heading bg-info text-white">
                                <strong><?php echo get_phrase('Availability Window');?></strong>
                            </div>
                            <div class="panel-body">
                                <div class="alert alert-info" role="alert">
                                    <i class="fa fa-info-circle"></i>
                                    <?php echo get_phrase('Students can only access this exam within this time range.');?>
                                </div>

                                <!-- Start Date & Time -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="start_datetime"><?php echo get_phrase('Start Date & Time');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="datetime-local" 
                                               class="form-control" 
                                               id="start_datetime" 
                                               name="start_datetime" 
                                               required>
                                        <small class="text-muted"><?php echo get_phrase('When should students be able to start this exam?');?></small>
                                    </div>
                                </div>

                                <!-- End Date & Time -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="end_datetime"><?php echo get_phrase('End Date & Time');?> <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="datetime-local" 
                                               class="form-control" 
                                               id="end_datetime" 
                                               name="end_datetime" 
                                               required>
                                        <small class="text-muted"><?php echo get_phrase('After this time, students will no longer be able to access the exam.');?></small>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ==================== ACTION BUTTONS ==================== -->
                        <div class="form-group m-t-20">
                            <div class="col-md-12">
                            <!--    THERE'S NO POINT SAVING AS DRAFT SINCE EXAM SETTINGS ARE CRUCIAL AND MUST BE FILLED OUT BEFORE ADDING QUESTIONS
                            <button type="submit" 
                                        class="btn btn-success btn-rounded" 
                                        name="action" 
                                        value="draft">
                                    <i class="fa fa-floppy-o"></i>&nbsp;<?php echo get_phrase('Save as Draft');?>
                                </button>
                                                -->
                                <button type="submit" 
                                        class="btn btn-primary btn-rounded" 
                                        name="action" 
                                        value="continue">
                                    <i class="fa fa-arrow-right"></i>&nbsp;<?php echo get_phrase('Continue to Questions');?>
                                </button>
                                <a href="<?php echo base_url();?>admin/cbt" class="btn btn-default btn-rounded">
                                    <i class="fa fa-times"></i>&nbsp;<?php echo get_phrase('Cancel');?>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function get_class_subject(class_id){
        if(class_id === ''){
            jQuery('#subject_selector_holder').html('<option value=""><?php echo get_phrase('Select a subject');?></option>').trigger('change');
            return;
        }

        $.ajax({
            url: '<?php echo base_url();?>admin/get_class_subject/' + class_id,
            success: function(response){
                jQuery('#subject_selector_holder').html('<option value=""><?php echo get_phrase('Select a subject');?></option>' + response).trigger('change');
            }
        });
    }
</script>


