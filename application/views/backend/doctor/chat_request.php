<?php
// $doctor_id = $this->session->userdata('doctor_id');


// $patients = $this->db->get_where('chat_request', array('patient_id' => $patient_id))->result_array();
//         foreach($patients as $key => $patient):
//             $doctor_id = $this->session->userdata('doctor_id');
//             endforeach;

// $patient_id = $this->session->userdata('patient_id');
// $doctor_id = $this->session->userdata('doctor_id');

//             $receivers = $this->db->get_where('chat', array('sender_message_id' => $doctor_id,'receiver_message_id' => $patient_id  )) ->result_array();
//                         foreach($receivers as $key => $chat):
//                             $receiver_message_id = $this->session->userdata('patient_id');
//                             $sender_message_id = $this->session->userdata('doctor_id');
//                         endforeach;

            ?>
            
            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info" style="margin-top: -10px;">
            <div class="panel-heading">
                <!-- <span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span  id="user_details"><span class="glyphicon glyphicon-user"></span></span> <?php echo $patient['name'];?>
        </strong></span> -->
        <span>Update chat request</span>
    </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="showme hidden" style="position: absolute; left:-120px; top:20px;">
                                <div class="well">
                                    <strong>Room Member/s:</strong>
                                    <div style="height: 10px;"></div>
                                </div>
                            </div>
                            <div>
                                
                            </div>
			<?php foreach($toSelectFromchatRequestWithId as $value) : ?>			


<?php 
          echo form_open(base_url() . 'doctor/chat_request/update/'.$value['chat_request_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

<div class="row">
                    <div class="col-sm-6">
	
					<div class="form-group">
                 		<label class="col-md-12" for="example-text"><?php echo get_phrase('patient_name');?></label>
                    	<div class="col-sm-12">
							<input type="text" class="form-control" name="title" value="<?=$value['patient_name']?>" required>
 
						</div>
					</div>
                    </div>
         </div>

<?php endforeach?>
          
     </div>
 </div>
</div>
<form id="createForm">
<div class="input-group">
    <!-- <input type="text" class="form-control" name="message" value="<?php echo $row['message'];?>" /> -->
    <!-- <input type="hidden" class="form-control" name="patient_id" value="<?php echo $patient['patient_id'];?>" required/> -->
    <!-- <input type="hidden" class="form-control" name="doctor_id" value="<?php echo"$doctor_id"; ?>" required/> -->
    
    <!-- <input type="hidden" class="form-control" name="status"
                    value="accept"/> -->

    <span class="input-group-btn">
    <?php 
//   if($chat_request['status'] == 'pending'):?>
    <input type="hidden" class="form-control" name="status"
                    value="accepted"/>
        <button type="submit" class="btn btn-success" >
            <!-- <span class="glyphicon glyphicon-comment"></span> -->
             Accept Chat Request</button>
             <?php
    //  endif?>
    </span>
   

    <!-- <span class="input-group-btn">
    <input type="hidden" class="form-control" name="status"
                    value="rejected"/>
        <button type="submit" class="btn btn-info" >
             Reject Chat Request</button>

    </span> -->


   
</div>

<!-- <div class="input-group">
     <span class="input-group-btn">
    <input type="hidden" class="form-control" name="status"
                    value="rejected"/>
        <button type="submit" class="btn btn-info" >
             Reject Chat Request</button>

    </span>
</div> -->
</form>
<script type="text/javascript">
    // $("#createForm").submit(function(event) {
    //         event.preventDefault();
    //         $.ajax({
    //                 url: "<?php echo base_url('doctor/create'); ?>",
    //                 data: $("#createForm").serialize(),
    //                 type: "post",
    //                 async: false,
    //                 dataType: 'json',
    //                 success: function(response){
                      
    //                     $('#createModal').modal('hide');
    //                     $('#createForm')[0].reset();
    //                    $('#exampleTable').DataTable().ajax.reload();
    //                   },
    //                error: function()
    //                {
    //                 alert("error");
    //                }
    //       });
    //     });
</script>


            