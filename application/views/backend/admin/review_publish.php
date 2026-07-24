<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <?php if (empty($exam)): ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-times-circle"></i>&nbsp;<?php echo get_phrase('Exam not found.');?> 
            </div>
        <?php else: ?>
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
                                            <td><?php echo html_escape($exam['title']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Class');?>:</strong></td>
                                            <td><?php echo html_escape($exam['class_name'] ?? ''); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Subject');?>:</strong></td>
                                            <td><?php echo html_escape($exam['subject_name'] ?? ''); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Status');?>:</strong></td>
                                            <td><?php echo ucfirst(html_escape($exam['status'])); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Duration');?>:</strong></td>
                                            <td><?php echo intval($exam['duration_minutes']); ?> <?php echo get_phrase('minutes');?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Start Time');?>:</strong></td>
                                            <td><?php echo date('M d, Y h:i A', strtotime($exam['start_at'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('End Time');?>:</strong></td>
                                            <td><?php echo date('M d, Y h:i A', strtotime($exam['end_at'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php echo get_phrase('Total Marks');?>:</strong></td>
                                            <td><?php echo intval($total_marks); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="alert alert-info m-t-20" role="alert">
                            <strong><?php echo get_phrase('Instructions for Students');?>:</strong>
                            <div class="m-t-10">
                                <?php echo nl2br(html_escape($exam['instructions'])); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-success m-b-20" role="alert">
                <i class="fa fa-check-circle"></i>&nbsp;
                <strong><?php echo get_phrase('Total Questions');?>:</strong> <?php echo intval($total_questions); ?>
                &nbsp;&middot;&nbsp;
                <strong><?php echo get_phrase('MCQ');?>:</strong> <?php echo intval($mcq_count); ?>
                &nbsp;&middot;&nbsp;
                <strong><?php echo get_phrase('Fill in the Blank');?>:</strong> <?php echo intval($fill_blank_count); ?>
            </div>

            <div class="panel panel-warning m-b-20">
                <div class="panel-heading">
                    <i class="fa fa-eye"></i>&nbsp;&nbsp;<?php echo get_phrase('Question Preview');?> 
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php if (empty($questions)): ?>
                            <div class="alert alert-warning" role="alert">
                                <i class="fa fa-exclamation-triangle"></i>&nbsp;<?php echo get_phrase('No questions have been added to this exam yet.');?> 
                            </div>
                        <?php else: ?>
                            <?php foreach ($questions as $index => $question): ?>
                                <div class="question-preview panel panel-default m-b-20">
                                    <div class="panel-heading bg-light">
                                        <div class="clearfix">
                                            <h5 class="m-0 pull-left"><strong><?php echo get_phrase('Question #') . ($index + 1); ?></strong> - <?php echo $question['question_type'] === 'mcq' ? get_phrase('Multiple Choice') : get_phrase('Fill in the Blank'); ?></h5>
                                            <div class="pull-right question-actions">
                                                <a href="<?php echo base_url(); ?>admin/cbt/edit_question/<?php echo intval($exam_id); ?>/<?php echo intval($question['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>&nbsp;<?php echo get_phrase('Edit'); ?></a>
                                                <form method="POST" action="<?php echo base_url(); ?>admin/cbt/delete_question/<?php echo intval($exam_id); ?>/<?php echo intval($question['id']); ?>" class="delete-question-form"><button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>&nbsp;<?php echo get_phrase('Delete'); ?></button></form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <p><strong><?php echo get_phrase('Question');?>:</strong></p>
                                            <p class="text-muted"><?php echo nl2br(html_escape($question['question_text'])); ?></p>
                                        </div>

                                        <?php if ($question['question_type'] === 'mcq'): ?>
                                            <div class="form-group">
                                                <p><strong><?php echo get_phrase('Options');?>:</strong></p>
                                                <ul class="list-unstyled">
                                                    <?php foreach ($question['options'] as $option): ?>
                                                        <li>
                                                            <strong><?php echo html_escape($option['label']); ?>.</strong>&nbsp;
                                                            <?php echo html_escape($option['option_text']); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <?php
                                                $correct_label = '';
                                                foreach ($question['options'] as $option) {
                                                    if (intval($option['is_correct']) === 1 || $option['is_correct'] === '1') {
                                                        $correct_label = $option['label'];
                                                        break;
                                                    }
                                                }
                                            ?>
                                            <div class="form-group">
                                                <span class="label label-info"><?php echo get_phrase('Correct Answer');?>: <?php echo html_escape($correct_label); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <span class="label label-info"><?php echo get_phrase('Correct Answer');?>: <?php echo html_escape($question['fill_blank_answer']['correct_answer'] ?? ''); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="panel panel-default m-b-20">
                <div class="panel-body text-center">
                    <form method="POST" action="<?php echo base_url();?>admin/cbt/publish_exam/<?php echo $exam_id; ?>" style="display: inline-block; width: 100%;">
                        <input type="hidden" name="exam_id" value="<?php echo intval($exam_id); ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?php echo base_url();?>admin/cbt/add_questions/<?php echo $exam_id; ?>" class="btn btn-default btn-block btn-rounded">
                                    <i class="fa fa-arrow-left"></i>&nbsp;<?php echo get_phrase('Back to Questions');?> 
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

            <div class="alert alert-info" role="alert">
                <i class="fa fa-info-circle"></i>&nbsp;
                <strong><?php echo get_phrase('Note');?>:</strong>
                <?php echo get_phrase('Once you publish this exam, it will be immediately available for students to access during the scheduled time window. Make sure all questions are correctly added before publishing.');?> 
            </div>
        <?php endif; ?>
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

    .question-actions .delete-question-form { display: inline-block; margin-left: 5px; }

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

    .question-actions .delete-question-form { display: inline-block; margin-left: 5px; }

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

<script type="text/javascript">
    $(document).on('submit', '.delete-question-form', function () {
        return confirm('<?php echo get_phrase('Are you sure you want to delete this question?'); ?>');
    });
</script>