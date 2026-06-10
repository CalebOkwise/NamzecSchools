<?php
$now = time();
$start_at = !empty($exam['start_at']) ? strtotime($exam['start_at']) : null;
$end_at = !empty($exam['end_at']) ? strtotime($exam['end_at']) : null;
$is_available = ($start_at && $end_at && $now >= $start_at && $now <= $end_at);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-file-text-o"></i>&nbsp;&nbsp;<?php echo get_phrase('Take CBT Exam'); ?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><?php echo html_escape($exam['title']); ?></h4>
                            <p><strong><?php echo get_phrase('Subject'); ?>:</strong> <?php echo html_escape($exam['subject_name']); ?></p>
                            <p><strong><?php echo get_phrase('Duration'); ?>:</strong> <?php echo html_escape($exam['duration_minutes']); ?> <?php echo get_phrase('minutes'); ?></p>
                            <p><strong><?php echo get_phrase('Start'); ?>:</strong> <?php echo date('Y-m-d H:i', $start_at); ?></p>
                            <p><strong><?php echo get_phrase('End'); ?>:</strong> <?php echo date('Y-m-d H:i', $end_at); ?></p>
                            <p><strong><?php echo get_phrase('Status'); ?>:</strong>
                                <?php if (!$start_at || !$end_at): ?>
                                    <?php echo get_phrase('Unknown'); ?>
                                <?php elseif ($now < $start_at): ?>
                                    <?php echo get_phrase('Upcoming'); ?>
                                <?php elseif ($now > $end_at): ?>
                                    <?php echo get_phrase('Closed'); ?>
                                <?php else: ?>
                                    <?php echo get_phrase('Available'); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="well bg-white">
                                <h5><?php echo get_phrase('Instructions'); ?></h5>
                                <p><?php echo nl2br(html_escape($exam['instructions'])); ?></p>
                                <div class="m-t-15">
                                    <strong><?php echo get_phrase('Note'); ?>:</strong>
                                    <?php echo get_phrase('This page displays the exam and answer fields only; answer submission is not saved yet.'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="form-horizontal">
                        <?php if (!empty($questions)): ?>
                            <?php foreach ($questions as $index => $question): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong><?php echo get_phrase('Question'); ?> <?php echo $index + 1; ?></strong>
                                        <span class="pull-right text-muted"><?php echo strtoupper(html_escape($question['question_type'])); ?></span>
                                    </div>
                                    <div class="panel-body">
                                        <p><?php echo nl2br(html_escape($question['question_text'])); ?></p>
                                        <?php if ($question['question_type'] == 'mcq'): ?>
                                            <?php if (!empty($question['options'])): ?>
                                                <?php foreach ($question['options'] as $option): ?>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="answer[<?php echo $question['id']; ?>]" value="<?php echo html_escape($option['label']); ?>">
                                                            <strong><?php echo html_escape($option['label']); ?>.</strong> <?php echo html_escape($option['option_text']); ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p class="text-muted"><?php echo get_phrase('No MCQ options are available for this question.'); ?></p>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="answer[<?php echo $question['id']; ?>]" placeholder="<?php echo get_phrase('Type your answer here'); ?>">
                                            </div>
                                            <?php if (!empty($question['blank_answer'])): ?>
                                                <small class="text-muted"><?php echo get_phrase('Blank-answer metadata has been loaded for this question.'); ?></small>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <?php echo get_phrase('This exam does not have any questions yet.'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary" disabled><?php echo get_phrase('Submit Answers'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
