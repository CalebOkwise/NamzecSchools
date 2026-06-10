<?php
$question_count = !empty($questions) ? count($questions) : 0;
$total_marks = 0;
foreach ($questions as $question) {
    $total_marks += (int) $question['marks'];
}
$status_class = 'label-default';
if ($exam['status'] == 'published') {
    $status_class = 'label-success';
} elseif ($exam['status'] == 'archived') {
    $status_class = 'label-danger';
}
?>

<div class="row">
    <div class="col-sm-12">
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
                                        <td><?php echo html_escape($class_name); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Subject');?>:</strong></td>
                                        <td><?php echo html_escape($subject_name); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Status');?>:</strong></td>
                                        <td><span class="label <?php echo $status_class; ?>"><?php echo ucfirst(html_escape($exam['status'])); ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Duration');?>:</strong></td>
                                        <td><?php echo html_escape($exam['duration_minutes']); ?> <?php echo get_phrase('minutes');?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('Start Time');?>:</strong></td>
                                        <td><?php echo date('M d, Y h:i A', strtotime($exam['start_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo get_phrase('End Time');?>:</strong></td>
                                        <td><?php echo date('M d, Y h:i A', strtotime($exam['end_at'])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="alert alert-info m-t-20" role="alert">
                        <strong><?php echo get_phrase('Instructions for Students');?>:</strong><br>
                        <p class="m-t-10"><?php echo nl2br(html_escape($exam['instructions'])); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($question_count > 0): ?>
            <div class="alert alert-success m-b-20" role="alert">
                <i class="fa fa-check-circle"></i>&nbsp;
                <strong><?php echo get_phrase('Total Questions');?>:</strong> <?php echo $question_count; ?> <?php echo get_phrase('questions');?>
                &nbsp; | &nbsp;
                <strong><?php echo get_phrase('Total Marks');?>:</strong> <?php echo $total_marks; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning m-b-20" role="alert">
                <i class="fa fa-warning"></i>&nbsp;
                <?php echo get_phrase('No questions have been added to this exam yet. Add at least one question before publishing.');?>
            </div>
        <?php endif; ?>

        <div class="panel panel-warning m-b-20">
            <div class="panel-heading">
                <i class="fa fa-eye"></i>&nbsp;&nbsp;<?php echo get_phrase('Question Preview');?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <?php if ($question_count > 0): ?>
                        <?php foreach ($questions as $index => $question): ?>
                            <div class="question-preview panel panel-default m-b-20">
                                <div class="panel-heading bg-light">
                                    <h5 class="m-0">
                                        <strong><?php echo get_phrase('Question');?> #<?php echo $index + 1; ?></strong>
                                        - <?php echo ($question['question_type'] == 'mcq') ? get_phrase('Multiple Choice') : get_phrase('Fill in the Blank'); ?>
                                        <span class="label label-default pull-right"><?php echo (int) $question['marks']; ?> <?php echo get_phrase('marks');?></span>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <div class="text-right m-b-10">
                                        <form method="POST" action="<?php echo base_url();?>admin/cbt/delete_question/<?php echo $exam_id; ?>/<?php echo $question['id']; ?>" style="display: inline;" onsubmit="return confirm('<?php echo get_phrase('Are you sure you want to delete this question?');?>');">
                                            <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                                                <i class="fa fa-trash"></i>&nbsp;<?php echo get_phrase('Delete Question');?>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <p><strong><?php echo get_phrase('Question');?>:</strong></p>
                                        <p class="text-muted"><?php echo nl2br(html_escape($question['question_text'])); ?></p>
                                    </div>

                                    <?php if ($question['question_type'] == 'mcq'): ?>
                                        <div class="form-group">
                                            <p><strong><?php echo get_phrase('Options');?>:</strong></p>
                                            <ul class="list-unstyled">
                                                <?php foreach ($question['options'] as $option): ?>
                                                    <li>
                                                        <strong><?php echo html_escape($option['label']); ?>.</strong>
                                                        <?php echo html_escape($option['option_text']); ?>
                                                        <?php if ($option['is_correct']): ?>
                                                            <span class="label label-info"><?php echo get_phrase('Correct');?></span>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group">
                                            <span class="label label-info">
                                                <?php echo get_phrase('Correct Answer');?>:
                                                <?php echo !empty($question['answer']) ? html_escape($question['answer']['correct_answer']) : get_phrase('Not set'); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted"><?php echo get_phrase('No questions to preview.');?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="panel panel-default m-b-20">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="<?php echo base_url();?>admin/cbt/edit_cbtexams/<?php echo $exam_id; ?>" class="btn btn-default btn-block btn-rounded">
                            <i class="fa fa-pencil"></i>&nbsp;<?php echo get_phrase('Edit Exam');?>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo base_url();?>admin/cbt/add_questions/<?php echo $exam_id; ?>" class="btn btn-warning btn-block btn-rounded">
                            <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Add Questions');?>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo base_url();?>admin/cbtDashboard" class="btn btn-info btn-block btn-rounded">
                            <i class="fa fa-list"></i>&nbsp;<?php echo get_phrase('Dashboard');?>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <form method="POST" action="<?php echo base_url();?>admin/cbt/publish_exam/<?php echo $exam_id; ?>">
                            <button type="submit" class="btn btn-success btn-block btn-rounded" <?php if ($question_count < 1) echo 'disabled'; ?>>
                                <i class="fa fa-rocket"></i>&nbsp;<?php echo get_phrase('Publish Exam');?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info" role="alert">
            <i class="fa fa-info-circle"></i>&nbsp;
            <strong><?php echo get_phrase('Note');?>:</strong>
            <?php echo get_phrase('Once you publish this exam, it will be available for students during the scheduled time window.');?>
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
