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
                             <?php $no = 1 ;  $get_patient_from_model = $this->crud_model->list_all_patient_and_order_with_patient_id();
                                    foreach ($get_patient_from_model as $key => $patient):
                                    	

        ?>
                                <td><?php echo $no++ ; ?></td>
                                <td><?php echo $patient['name'];?></td>
                                <td><a href="<?php echo base_url();?>doctor/chat/<?php echo $patient['patient_id'];?>"
                                    class="btn btn btn-info btn-circle btn-xs" ><i class="prime zmdi zmdi-comment-outline"></i></a></td>
                                   
                                
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

        
                        

