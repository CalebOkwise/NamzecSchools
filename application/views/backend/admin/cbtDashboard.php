<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-laptop"></i>&nbsp;&nbsp;<?php echo get_phrase('CBT Center');?>
                <div class="pull-right">
                    <a href="<?php echo base_url();?>admin/create_cbtexam" class="btn btn-success btn-rounded btn-sm">
                        <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('Create New CBT Exam');?>
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
                            <!-- Dummy Data Row 1 -->
                            <tr>
                                <td>1</td>
                                <td>Mathematics Final Exam</td>
                                <td>JSS2</td>
                                <td>Mathematics</td>
                                <td><span class="label label-success">Active</span></td>
                                <td>2026-04-25 09:00 AM</td>
                                <td>2026-04-25 11:30 AM</td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/cbt/edit_exam/1" class="btn btn-info btn-circle btn-xs" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/add_questions/1" class="btn btn-warning btn-circle btn-xs" title="Add Questions">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/preview_exam/1" class="btn btn-primary btn-circle btn-xs" title="Preview">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirm_delete('<?php echo base_url();?>admin/cbt/delete_exam/1');" class="btn btn-danger btn-circle btn-xs" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Dummy Data Row 2 -->
                            <tr>
                                <td>2</td>
                                <td>English Language Assessment</td>
                                <td>SS1</td>
                                <td>English</td>
                                <td><span class="label label-warning">Scheduled</span></td>
                                <td>2026-05-01 02:00 PM</td>
                                <td>2026-05-01 03:30 PM</td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/cbt/edit_exam/2" class="btn btn-info btn-circle btn-xs" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/add_questions/2" class="btn btn-warning btn-circle btn-xs" title="Add Questions">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/preview_exam/2" class="btn btn-primary btn-circle btn-xs" title="Preview">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirm_delete('<?php echo base_url();?>admin/cbt/delete_exam/2');" class="btn btn-danger btn-circle btn-xs" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Dummy Data Row 3 -->
                            <tr>
                                <td>3</td>
                                <td>Biology Practical Test</td>
                                <td>SS2</td>
                                <td>Biology</td>
                                <td><span class="label label-default">Draft</span></td>
                                <td>2026-05-10 10:00 AM</td>
                                <td>2026-05-10 12:00 PM</td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/cbt/edit_exam/3" class="btn btn-info btn-circle btn-xs" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/add_questions/3" class="btn btn-warning btn-circle btn-xs" title="Add Questions">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/preview_exam/3" class="btn btn-primary btn-circle btn-xs" title="Preview">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirm_delete('<?php echo base_url();?>admin/cbt/delete_exam/3');" class="btn btn-danger btn-circle btn-xs" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Dummy Data Row 4 -->
                            <tr>
                                <td>4</td>
                                <td>History Test</td>
                                <td>JSS1</td>
                                <td>History</td>
                                <td><span class="label label-danger">Closed</span></td>
                                <td>2026-04-15 01:00 PM</td>
                                <td>2026-04-15 02:00 PM</td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/cbt/edit_exam/4" class="btn btn-info btn-circle btn-xs" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/add_questions/4" class="btn btn-warning btn-circle btn-xs" title="Add Questions">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo base_url();?>admin/cbt/preview_exam/4" class="btn btn-primary btn-circle btn-xs" title="Preview">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="javascript:void(0);" onclick="confirm_delete('<?php echo base_url();?>admin/cbt/delete_exam/4');" class="btn btn-danger btn-circle btn-xs" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
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
