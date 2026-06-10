<?php
$now = time();
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;<?php echo get_phrase('CBT Exams'); ?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo get_phrase('Exam Title'); ?></th>
                                    <th><?php echo get_phrase('Subject'); ?></th>
                                    <th><?php echo get_phrase('Duration (mins)'); ?></th>
                                    <th><?php echo get_phrase('Start'); ?></th>
                                    <th><?php echo get_phrase('End'); ?></th>
                                    <th><?php echo get_phrase('Status'); ?></th>
                                    <th><?php echo get_phrase('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($cbt_exams)): ?>
                                    <?php $counter = 1; ?>
                                    <?php foreach ($cbt_exams as $exam): ?>
                                        <?php
                                            $start_at = strtotime($exam['start_at']);
                                            $end_at = strtotime($exam['end_at']);
                                            if ($now < $start_at) {
                                                $status = get_phrase('Upcoming');
                                                $can_take = false;
                                            } elseif ($now > $end_at) {
                                                $status = get_phrase('Closed');
                                                $can_take = false;
                                            } else {
                                                $status = get_phrase('Available');
                                                $can_take = true;
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td><?php echo html_escape($exam['title']); ?></td>
                                            <td><?php echo html_escape($exam['subject_name']); ?></td>
                                            <td><?php echo html_escape($exam['duration_minutes']); ?></td>
                                            <td><?php echo date('Y-m-d H:i', $start_at); ?></td>
                                            <td><?php echo date('Y-m-d H:i', $end_at); ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <?php if ($can_take): ?>
                                                    <a href="<?php echo base_url('student/take_cbt_exam/'.$exam['id']); ?>" class="btn btn-primary btn-sm"><?php echo get_phrase('Take Exam'); ?></a>
                                                <?php else: ?>
                                                    <button class="btn btn-default btn-sm" disabled><?php echo get_phrase('Not Available'); ?></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted"><?php echo get_phrase('No published CBT exams are available for your class at this time.'); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
