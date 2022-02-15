<?php
$patient_id = $this->session->userdata('patient_id');
$doctor_id = $this->session->userdata('doctor_id');
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list');?>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body table-responsive">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <!-- <th>Status</th> -->
                                <th>chat</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                             <?php $no = 1 ;  $get_doctor_from_model = $this->chat_model->list_all_doctor_who_accepted_chat_request($patient_id);
                                    foreach ($get_doctor_from_model as $key => $doctor):
                                    	

        ?>
                                <td><?php echo $no++ ; ?></td>
                                <td><?php echo $doctor['doctor_name'];?></td>
                                <td>
                                    <?php
               if($doctor['status'] == 'accepted') :?>
                                    <a href="<?php echo base_url();?>patient/chat/<?php echo $doctor['doctor_id'];?>"
                                    class="btn btn btn-success btn-circle btn-xs" ><i class="prime zmdi zmdi-comment-outline"></i></a>

                                    <?php endif?>

                                    <?php
               if($doctor['status'] == 'pending') :?>
                                    <a href="#"
                                    class="btn btn btn-info btn-circle btn-xs" ><i class="prime zmdi zmdi-comment-outline"></i>Request pending</a>

                                    <?php endif?>
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


<script>
    
</script>



        
                        

