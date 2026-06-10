<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-laptop"></i>&nbsp;&nbsp;<?php echo get_phrase('CBT Center');?>
                <div class="pull-right">
                    <a href="<?php echo base_url();?>admin/create_cbtexam" class="btn btn-success btn-rounded btn-sm">
                        <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Create CBT Exam');?>
                    </a>
                </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body table-responsive">
                    <table id="cbt_exams_table" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><div><?php echo get_phrase('#');?></div></th>
                                <th><div><?php echo get_phrase('Exam Title');?></div></th>
                                <th><div><?php echo get_phrase('Class');?></div></th>
                                <th><div><?php echo get_phrase('Subject');?></div></th>
                                <th><div><?php echo get_phrase('Status');?></div></th>
                                <th><div><?php echo get_phrase('Start Time');?></div></th>
                                <th><div><?php echo get_phrase('End Time');?></div></th>
                                <th><div><?php echo get_phrase('Options');?></div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $counter = 1;
                            foreach ($cbt_exams as $exam): 
                                $status_label = '';
                                $status_class = '';
                                if ($exam['status'] == 'draft') {
                                    $status_label = 'Draft';
                                    $status_class = 'label-default';
                                } elseif ($exam['status'] == 'published') {
                                    $status_label = 'Active';
                                    $status_class = 'label-success';
                                } elseif ($exam['status'] == 'archived') {
                                    $status_label = 'Closed';
                                    $status_class = 'label-danger';
                                }
                            ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $exam['title']; ?></td>
                                <td><?php echo $exam['class_name']; ?></td>
                                <td><?php echo $exam['subject_name']; ?></td>
                                <td><span class="label <?php echo $status_class; ?>"><?php echo $status_label; ?></span></td>
                                <td><?php echo date('M d, Y h:i A', strtotime($exam['start_at'])); ?></td>
                                <td><?php echo date('M d, Y h:i A', strtotime($exam['end_at'])); ?></td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/cbt/edit_exam/<?php echo $exam['id']; ?>" class="btn btn-info btn-circle btn-xs" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/add_questions/<?php echo $exam['id']; ?>" class="btn btn-warning btn-circle btn-xs" title="Add Questions">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/review_publish/<?php echo $exam['id']; ?>" class="btn btn-primary btn-circle btn-xs" title="Review">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirm_delete('<?php echo base_url();?>admin/cbt/delete_exam/<?php echo $exam['id']; ?>');" class="btn btn-danger btn-circle btn-xs" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#cbt_exams_table').DataTable({
            "scrollX": true
        });
    });

    function confirm_delete(url) {
        if (confirm('<?php echo get_phrase('Are you sure you want to delete this exam?');?>')) {
            window.location = url;
        }
    }
</script>
