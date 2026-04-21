<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('Add Questions to Exam');?>
                <div class="pull-right">
                    <span class="text-muted"><?php echo get_phrase('Exam ID: #EX001');?></span>
                </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">

                    <!-- Top Controls Section -->
                    <div class="row m-b-20">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-rounded" id="add_question_btn">
                                <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Question');?>
                            </button>
                            <a href="<?php echo base_url();?>admin/cbt/review_exam/1" class="btn btn-primary btn-rounded pull-right">
                                <i class="fa fa-arrow-right"></i>&nbsp;<?php echo get_phrase('Review & Publish');?>
                            </a>
                        </div>
                    </div>

                    <hr class="m-t-20 m-b-20">

                    <!-- Questions Container -->
                    <form method="POST" action="<?php echo base_url();?>admin/cbt/save_questions" id="questions_form">
                        <div id="questions_container">

                            <!-- Sample Question Card 1 - Multiple Choice -->
                            <div class="question-card panel panel-default m-b-20" data-question-id="1">
                                <div class="panel-heading bg-primary text-white">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <strong><?php echo get_phrase('Question #1');?></strong>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control question-type-select pull-right" name="question_type[1]" style="width: 200px;">
                                                <option value="multiple_choice" selected><?php echo get_phrase('Multiple Choice');?></option>
                                                <option value="fill_blank"><?php echo get_phrase('Fill in the Blank');?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    
                                    <!-- Question Input -->
                                    <div class="form-group">
                                        <label><?php echo get_phrase('Question');?> <span class="text-danger">*</span></label>
                                        <textarea class="form-control question-text" 
                                                  name="question_text[1]" 
                                                  rows="4" 
                                                  placeholder="<?php echo get_phrase('Enter your question here. You can copy-paste from Word.');?>"
                                                  required></textarea>
                                        <small class="text-muted"><?php echo get_phrase('Supports rich text formatting');?></small>
                                    </div>

                                    <!-- Answer Section - Multiple Choice (Initially Shown) -->
                                    <div class="answer-section multiple-choice-section">
                                        <div class="form-group">
                                            <label><?php echo get_phrase('Options');?> <span class="text-danger">*</span></label>
                                            
                                            <!-- Option A -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">A</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_a[1]" 
                                                           placeholder="<?php echo get_phrase('Enter Option A');?>"
                                                           required>
                                                </div>
                                            </div>

                                            <!-- Option B -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">B</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_b[1]" 
                                                           placeholder="<?php echo get_phrase('Enter Option B');?>"
                                                           required>
                                                </div>
                                            </div>

                                            <!-- Option C -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">C</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_c[1]" 
                                                           placeholder="<?php echo get_phrase('Enter Option C');?>"
                                                           required>
                                                </div>
                                            </div>

                                            <!-- Option D -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">D</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_d[1]" 
                                                           placeholder="<?php echo get_phrase('Enter Option D');?>"
                                                           required>
                                                </div>
                                            </div>

                                            <!-- Correct Answer -->
                                            <div class="form-group">
                                                <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                                                <select class="form-control correct-answer-select" name="correct_answer[1]" required>
                                                    <option value=""><?php echo get_phrase('Select correct answer');?></option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Answer Section - Fill in the Blank (Hidden by default) -->
                                    <div class="answer-section fill-blank-section" style="display: none;">
                                        <div class="form-group">
                                            <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="blank_answer[1]" 
                                                   placeholder="<?php echo get_phrase('Enter the correct answer');?>">
                                            <small class="text-muted"><?php echo get_phrase('Students will need to type this exact answer');?></small>
                                        </div>
                                    </div>

                                </div>

                                <!-- Question Card Footer -->
                                <div class="panel-footer bg-light">
                                    <button type="button" class="btn btn-warning btn-sm duplicate-question-btn" title="<?php echo get_phrase('Duplicate this question');?>">
                                        <i class="fa fa-copy"></i>&nbsp;<?php echo get_phrase('Duplicate');?>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm delete-question-btn pull-right" title="<?php echo get_phrase('Delete this question');?>">
                                        <i class="fa fa-trash"></i>&nbsp;<?php echo get_phrase('Delete');?>
                                    </button>
                                </div>
                            </div>

                            <!-- Sample Question Card 2 - Fill in the Blank -->
                            <div class="question-card panel panel-default m-b-20" data-question-id="2">
                                <div class="panel-heading bg-primary text-white">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <strong><?php echo get_phrase('Question #2');?></strong>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control question-type-select pull-right" name="question_type[2]" style="width: 200px;">
                                                <option value="multiple_choice"><?php echo get_phrase('Multiple Choice');?></option>
                                                <option value="fill_blank" selected><?php echo get_phrase('Fill in the Blank');?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    
                                    <!-- Question Input -->
                                    <div class="form-group">
                                        <label><?php echo get_phrase('Question');?> <span class="text-danger">*</span></label>
                                        <textarea class="form-control question-text" 
                                                  name="question_text[2]" 
                                                  rows="4" 
                                                  placeholder="<?php echo get_phrase('Enter your question here');?>"
                                                  required></textarea>
                                        <small class="text-muted"><?php echo get_phrase('Example: The capital of Nigeria is __________.');?></small>
                                    </div>

                                    <!-- Answer Section - Multiple Choice (Hidden) -->
                                    <div class="answer-section multiple-choice-section" style="display: none;">
                                        <div class="form-group">
                                            <label><?php echo get_phrase('Options');?> <span class="text-danger">*</span></label>
                                            
                                            <!-- Option A -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">A</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_a[2]" 
                                                           placeholder="<?php echo get_phrase('Enter Option A');?>">
                                                </div>
                                            </div>

                                            <!-- Option B -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">B</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_b[2]" 
                                                           placeholder="<?php echo get_phrase('Enter Option B');?>">
                                                </div>
                                            </div>

                                            <!-- Option C -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">C</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_c[2]" 
                                                           placeholder="<?php echo get_phrase('Enter Option C');?>">
                                                </div>
                                            </div>

                                            <!-- Option D -->
                                            <div class="form-group m-b-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon bg-info text-white">D</span>
                                                    <input type="text" 
                                                           class="form-control option-input" 
                                                           name="option_d[2]" 
                                                           placeholder="<?php echo get_phrase('Enter Option D');?>">
                                                </div>
                                            </div>

                                            <!-- Correct Answer -->
                                            <div class="form-group">
                                                <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                                                <select class="form-control correct-answer-select" name="correct_answer[2]">
                                                    <option value=""><?php echo get_phrase('Select correct answer');?></option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Answer Section - Fill in the Blank (Initially Shown) -->
                                    <div class="answer-section fill-blank-section">
                                        <div class="form-group">
                                            <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="blank_answer[2]" 
                                                   placeholder="<?php echo get_phrase('Enter the correct answer');?>"
                                                   value="Abuja">
                                            <small class="text-muted"><?php echo get_phrase('Students will need to type this exact answer');?></small>
                                        </div>
                                    </div>

                                </div>

                                <!-- Question Card Footer -->
                                <div class="panel-footer bg-light">
                                    <button type="button" class="btn btn-warning btn-sm duplicate-question-btn">
                                        <i class="fa fa-copy"></i>&nbsp;<?php echo get_phrase('Duplicate');?>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm delete-question-btn pull-right">
                                        <i class="fa fa-trash"></i>&nbsp;<?php echo get_phrase('Delete');?>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- Bottom Action Buttons -->
                        <div class="m-t-30 p-t-20 border-top">
                            <button type="submit" class="btn btn-success btn-rounded">
                                <i class="fa fa-floppy-o"></i>&nbsp;<?php echo get_phrase('Save Questions');?>
                            </button>
                            <a href="<?php echo base_url();?>admin/cbt/review_exam/1" class="btn btn-primary btn-rounded">
                                <i class="fa fa-arrow-right"></i>&nbsp;<?php echo get_phrase('Review & Publish');?>
                            </a>
                            <a href="<?php echo base_url();?>admin/cbt" class="btn btn-default btn-rounded">
                                <i class="fa fa-times"></i>&nbsp;<?php echo get_phrase('Cancel');?>
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .question-card {
        border-left: 4px solid #3498db;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .question-card .panel-heading {
        padding: 15px;
    }

    .question-card .panel-body {
        padding: 20px;
    }

    .question-card .panel-footer {
        padding: 10px 15px;
        border-top: 1px solid #ddd;
    }

    .input-group-addon {
        min-width: 40px;
        text-align: center;
    }

    .answer-section {
        margin-top: 15px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 4px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-20 {
        margin-top: 20px;
    }

    .m-t-30 {
        margin-top: 30px;
    }

    .p-t-20 {
        padding-top: 20px;
    }

    .border-top {
        border-top: 1px solid #ddd;
    }

    .bg-light {
        background-color: #f5f5f5;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        
        // Handle question type change
        $(document).on('change', '.question-type-select', function() {
            var questionCard = $(this).closest('.question-card');
            var selectedType = $(this).val();

            if (selectedType === 'multiple_choice') {
                questionCard.find('.multiple-choice-section').show();
                questionCard.find('.fill-blank-section').hide();
                // Update required attribute
                questionCard.find('.multiple-choice-section').find('input, select').prop('required', true);
                questionCard.find('.fill-blank-section').find('input').prop('required', false);
            } else if (selectedType === 'fill_blank') {
                questionCard.find('.multiple-choice-section').hide();
                questionCard.find('.fill-blank-section').show();
                // Update required attribute
                questionCard.find('.multiple-choice-section').find('input, select').prop('required', false);
                questionCard.find('.fill-blank-section').find('input').prop('required', true);
            }
        });

        // Handle add question button
        $('#add_question_btn').on('click', function() {
            var questionCount = $('#questions_container .question-card').length + 1;
            var newQuestionCard = createQuestionCard(questionCount);
            $('#questions_container').append(newQuestionCard);
            // Scroll to new question
            $('html, body').animate({
                scrollTop: $('#questions_container').find('.question-card').last().offset().top - 100
            }, 500);
        });

        // Handle duplicate question
        $(document).on('click', '.duplicate-question-btn', function() {
            var originalCard = $(this).closest('.question-card');
            var newCard = originalCard.clone();
            var newId = Date.now(); // Use timestamp for unique ID
            newCard.attr('data-question-id', newId);
            newCard.find('input, select, textarea').each(function() {
                var name = $(this).attr('name');
                if (name) {
                    $(this).attr('name', name.replace(/\[\d+\]/g, '[' + newId + ']'));
                }
            });
            newCard.find('.question-card').find('.panel-heading strong').text('<?php echo get_phrase('Question'); ?> #' + newId);
            originalCard.after(newCard);
        });

        // Handle delete question
        $(document).on('click', '.delete-question-btn', function() {
            if ($('#questions_container .question-card').length === 1) {
                alert('<?php echo get_phrase('You must have at least one question.');?>');
                return;
            }
            $(this).closest('.question-card').fadeOut(300, function() {
                $(this).remove();
            });
        });

    });

    // Function to create a new question card
    function createQuestionCard(questionNumber) {
        var newId = Date.now();
        return `
            <div class="question-card panel panel-default m-b-20" data-question-id="${newId}">
                <div class="panel-heading bg-primary text-white">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><?php echo get_phrase('Question'); ?> #${questionNumber}</strong>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control question-type-select pull-right" name="question_type[${newId}]" style="width: 200px;">
                                <option value="multiple_choice" selected><?php echo get_phrase('Multiple Choice');?></option>
                                <option value="fill_blank"><?php echo get_phrase('Fill in the Blank');?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo get_phrase('Question');?> <span class="text-danger">*</span></label>
                        <textarea class="form-control question-text" 
                                  name="question_text[${newId}]" 
                                  rows="4" 
                                  placeholder="<?php echo get_phrase('Enter your question here');?>"
                                  required></textarea>
                        <small class="text-muted"><?php echo get_phrase('Supports rich text formatting');?></small>
                    </div>
                    <div class="answer-section multiple-choice-section">
                        <div class="form-group">
                            <label><?php echo get_phrase('Options');?> <span class="text-danger">*</span></label>
                            <div class="form-group m-b-10">
                                <div class="input-group">
                                    <span class="input-group-addon bg-info text-white">A</span>
                                    <input type="text" class="form-control option-input" name="option_a[${newId}]" placeholder="<?php echo get_phrase('Enter Option A');?>" required>
                                </div>
                            </div>
                            <div class="form-group m-b-10">
                                <div class="input-group">
                                    <span class="input-group-addon bg-info text-white">B</span>
                                    <input type="text" class="form-control option-input" name="option_b[${newId}]" placeholder="<?php echo get_phrase('Enter Option B');?>" required>
                                </div>
                            </div>
                            <div class="form-group m-b-10">
                                <div class="input-group">
                                    <span class="input-group-addon bg-info text-white">C</span>
                                    <input type="text" class="form-control option-input" name="option_c[${newId}]" placeholder="<?php echo get_phrase('Enter Option C');?>" required>
                                </div>
                            </div>
                            <div class="form-group m-b-10">
                                <div class="input-group">
                                    <span class="input-group-addon bg-info text-white">D</span>
                                    <input type="text" class="form-control option-input" name="option_d[${newId}]" placeholder="<?php echo get_phrase('Enter Option D');?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                                <select class="form-control correct-answer-select" name="correct_answer[${newId}]" required>
                                    <option value=""><?php echo get_phrase('Select correct answer');?></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="answer-section fill-blank-section" style="display: none;">
                        <div class="form-group">
                            <label><?php echo get_phrase('Correct Answer');?> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="blank_answer[${newId}]" placeholder="<?php echo get_phrase('Enter the correct answer');?>">
                            <small class="text-muted"><?php echo get_phrase('Students will need to type this exact answer');?></small>
                        </div>
                    </div>
                </div>
                <div class="panel-footer bg-light">
                    <button type="button" class="btn btn-warning btn-sm duplicate-question-btn">
                        <i class="fa fa-copy"></i>&nbsp;<?php echo get_phrase('Duplicate');?>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm delete-question-btn pull-right">
                        <i class="fa fa-trash"></i>&nbsp;<?php echo get_phrase('Delete');?>
                    </button>
                </div>
            </div>
        `;
    }
</script>
