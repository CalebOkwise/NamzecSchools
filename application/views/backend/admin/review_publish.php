<div class="row">
    <div class="col-sm-12">
        
        <!-- ==================== EXAM SUMMARY SECTION ==================== -->
        <div class="panel panel-info m-b-20">
            <div class="panel-heading">
                <i class="fa fa-info-circle"></i>&nbsp;&nbsp;<?php echo get_phrase('Exam Summary');?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Exam Title');?>:</strong></td>
                                        <td>Mathematics Final Exam</td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Class');?>:</strong></td>
                                        <td>JSS2</td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Subject');?>:</strong></td>
                                        <td>Mathematics</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Duration');?>:</strong></td>
                                        <td>90 minutes</td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Start Time');?>:</strong></td>
                                        <td>2026-04-25 09:00 AM</td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('End Time');?>:</strong></td>
                                        <td>2026-04-25 05:00 PM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Instructions Display -->
                    <div class="alert alert-info m-t-20" role="alert">
                        <strong><?php echo get_phrase('Instructions for Students');?>:</strong><br>
                        <p class="m-t-10">
                            <?php echo get_phrase('This is a comprehensive mathematics examination covering all topics from the first and second terms. You have 90 minutes to complete this examination. Answer all questions to the best of your ability. No cheating or unauthorized assistance is allowed.');?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== QUESTIONS COUNT ==================== -->
        <div class="alert alert-success m-b-20" role="alert">
            <i class="fa fa-check-circle"></i>&nbsp;
            <strong><?php echo get_phrase('Total Questions');?>:</strong> 2 <?php echo get_phrase('questions');?>
        </div>

        <!-- ==================== QUESTIONS PREVIEW ==================== -->
        <div class="panel panel-warning m-b-20">
            <div class="panel-heading">
                <i class="fa fa-eye"></i>&nbsp;&nbsp;<?php echo get_phrase('Question Preview');?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <!-- Question 1 Preview -->
                    <div class="question-preview panel panel-default m-b-20">
                        <div class="panel-heading bg-light">
                            <h5 class="m-0"><strong><?php echo get_phrase('Question #1');?></strong> - <?php echo get_phrase('Multiple Choice');?></h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <p><strong><?php echo get_phrase('Question');?>:</strong></p>
                                <p class="text-muted">
                                    <?php echo get_phrase('What is the value of 15 × 12?');?>
                                </p>
                            </div>

                            <div class="form-group">
                                <p><strong><?php echo get_phrase('Options');?>:</strong></p>
                                <ul class="list-unstyled">
                                    <li><strong>A.</strong> 150</li>
                                    <li><strong>B.</strong> 160</li>
                                    <li><strong>C.</strong> 180</li>
                                    <li><strong>D.</strong> 200</li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <span class="label label-info"><?php echo get_phrase('Correct Answer');?>: C</span>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 Preview -->
                    <div class="question-preview panel panel-default m-b-20">
                        <div class="panel-heading bg-light">
                            <h5 class="m-0"><strong><?php echo get_phrase('Question #2');?></strong> - <?php echo get_phrase('Fill in the Blank');?></h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <p><strong><?php echo get_phrase('Question');?>:</strong></p>
                                <p class="text-muted">
                                    <?php echo get_phrase('The sum of angles in a triangle is __________°.');?>
                                </p>
                            </div>

                            <div class="form-group">
                                <span class="label label-info"><?php echo get_phrase('Correct Answer');?>: 180</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ==================== ACTION BUTTONS ==================== -->
        <div class="panel panel-default m-b-20">
            <div class="panel-body text-center">
                <form method="POST" action="<?php echo base_url();?>admin/cbt/publish_exam" style="display: inline-block; width: 100%;">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo base_url();?>admin/cbt/edit_exam/1" class="btn btn-default btn-block btn-rounded">
                                <i class="fa fa-arrow-left"></i>&nbsp;<?php echo get_phrase('Back to Edit');?>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-warning btn-block btn-rounded" name="action" value="draft">
                                <i class="fa fa-floppy-o"></i>&nbsp;<?php echo get_phrase('Save as Draft');?>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success btn-block btn-rounded" name="action" value="publish">
                                <i class="fa fa-rocket"></i>&nbsp;<?php echo get_phrase('Publish Exam');?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- ==================== PUBLISHED INFO ==================== -->
        <div class="alert alert-info" role="alert">
            <i class="fa fa-info-circle"></i>&nbsp;
            <strong><?php echo get_phrase('Note');?>:</strong> 
            <?php echo get_phrase('Once you publish this exam, it will be immediately available for students to access during the scheduled time window. Make sure all questions are correctly added before publishing.');?>
        </div>

    </div>
</div>

<style>
    .table-borderless td {
        border: none;
        padding: 8px 0;
    }

    .question-preview {
        border-left: 4px solid #f0ad4e;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .question-preview .panel-heading {
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    .question-preview .panel-body {
        padding: 15px;
    }

    .bg-light {
        background-color: #f5f5f5;
    }

    .m-0 {
        margin: 0;
    }

    .m-t-10 {
        margin-top: 10px;
    }

    .m-t-20 {
        margin-top: 20px;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .text-center {
        text-align: center;
    }
</style>
