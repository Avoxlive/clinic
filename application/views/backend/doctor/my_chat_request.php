<?php
$patient_name = $this->session->userdata('name');
$patient_id = $this->session->userdata('patient_id');
// $patient_name = $this->db->get_where('patient',array('name' => $this->session->userdata('name')));

$patients = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
        foreach($patients as $key => $patient):
            // $patient_id = $this->session->userdata('patient_id');
            $doctor_id = $this->session->userdata('doctor_id');
            endforeach;
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
                             <?php $no = 1 ;  $get_patient_from_model =( $this->chat_model->list_all_patient_and_order_with_chat_request($doctor_id)) and ($this->crud_model->list_all_patient_and_order_with_patient_id());
                            //  <?php $no = 1 ;  $get_patient_from_model = $this->chat_model->list_all_patient_and_order_with_chat_request($doctor_id);
                                    foreach ($get_patient_from_model as $key => $patient):
    ?>
    
    <?php if($patient['status'] == 'pending'):?>
                                <td><?php echo $no++ ; ?></td>
                                <!-- <td><?php echo $patient['patient_id'];?></td> -->
                                <td><?php echo $patient['patient_name'];?></td>
                                <td>
                                <a href="<?php echo base_url();?>doctor/edit_chat_request/<?php echo $patient['chat_request_id'];?>"
                                    class="btn btn btn-info btn-circle btn-xs" ><i class="prime zmdi zmdi-comment-outline"></i>sent request</a>
                            
                                </td>
                                <?php endif?>

                                    <!-- <a href="<?php echo base_url();?>doctor/edit_jitsi/<?php echo $row['jitsi_id'];?>"><button
				                                        type="button" class="btn btn-info btn-rounded btn-sm"><i
				                                            class="fa fa-edit"></i> edit</button></a> -->
                                   
                                
                             </tr>
                            <?php  endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        
                        

