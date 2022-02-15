<?php 
$name = $this->session->userdata('name');

// $doctors = $this->session->userdata('doctor_id');
    // $doctors = $this->db->get_where('patient', array('patient_id' => $patient_id ))->row();
    //    $doctors = $this->db->get_where('doctor', array('doctor_id' => $doctor_id,'name' => $name))->result_array();
       $doctors = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
        foreach($doctors as $key => $doctor):
            $patient_id = $this->session->userdata('patient_id');
            $patient_name = $this->session->userdata('patient_name');
            endforeach;

     


            ?> 



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info" style="margin-top: -10px;">
            <div class="panel-heading">
                <!-- <span
                    style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span
                            id="user_details"><span class="glyphicon glyphicon-user"></span></span>
                        <?php echo $doctor['name'];?>
                    </strong></span> -->
                    <h4>Send Chat Request</h4>
                </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <!-- <div class="showme hidden" style="position: absolute; left:-120px; top:20px;">
                                <div class="well">
                                    <strong>Room Member/s:</strong>
                                    <div style="height: 10px;"></div>
                                </div>
                            </div> -->

                         

				                    <?php 
                                    echo form_open(base_url() . 'patient/chat_request/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

<!-- <span style="margin-left:10px;">chat Request status</span><br> -->

<?php
                                 $get_chat_request_status_from_model = $this->chat_model->fetch_chat_status_from_doctor($patient_id,$doctor_id); 
                                 foreach ($get_chat_request_status_from_model as $key => $chat_request):?>

<?php 
                                //   if($chat_request['status'] == 'pending'): ?>
                                            <div class="">
                                    <p>The Chat Request sent by you is <?php echo $chat_request['status'];?></p>
                                    
                                
                                   
                                <div style="height:10px;"></div>
                                </div>
                                <?php
                                //  endif?>

                                 <?php endforeach?>
                         
                    </div>
                </div>
            </div>
        </div>
        <form id="createForm">
            <div class="input-group">
                <!-- <input type="text" class="form-control" name="message" value="<?php echo $row['message'];?>" /> -->
                <input type="hidden" class="form-control" name="doctor_id"
                    value="<?php echo $doctor['doctor_id'];?>" required />
                    <input type="hidden" class="form-control" name="doctor_name"
                    value="<?php echo $doctor['name'];?>" required />

                    <input type="hidden" class="form-control" name="status"
                    value="pending"/>

                <input type="hidden" class="form-control" name="patient_id" value="<?php echo"$patient_id"; ?>"
                    required />
                    <input type="hidden" class="form-control" name="patient_name" value="<?php echo"$name"; ?>"
                   >
                <span class="input-group-btn">

                <?php if($chat_request['status'] == ''):?>
                    <button type="submit" class="btn btn-success">
                        <!-- <span class="glyphicon glyphicon-comment"></span> -->
                        Send request
                    </button>
                    <?php endif?>
                </span>
            </div>
        </form>
        <script type="text/javascript">
        // $("#createForm").submit(function(event) {
        //     event.preventDefault();
        //     $.ajax({
        //         url: "<?php echo base_url('patient/create'); ?>",
        //         data: $("#createForm").serialize(),
        //         type: "post",
        //         async: false,
        //         dataType: 'json',
        //         success: function(response) {

        //             $('#createModal').modal('hide');
        //             $('#createForm')[0].reset();
        //             $('#exampleTable').DataTable().ajax.reload();
        //         },
        //         error: function() {
        //             alert("error");
        //         }
        //     });
        // });


        // $(document).on('click', '#msg', function() {
        //     let xhr = new XMLHttpRequest();
        //     xhr.open("POST", "php/insert_chat.php", true);
        //     xhr.onload = () => {
        //         if (xhr.readyState == XMLHttpRequest.DONE) {
        //             if (xhr.status == 200) {
        //                 let data = xhr.response;
        //                 console.log(data);
        //                 if (data == "success") {
        //                     location.href = "my_chat.php";
        //                 } else {
        //                     errorText.style.display = "block";
        //                     errorText.textcontent = data;
        //                 }
        //             }
        //         }
        //     }
        // });






        //     function load_chat_data(doctor_id,message)
        //     {
        //     $.ajax({
        //      url:"<?php echo base_url();?>patient/load_chat_data",
        //      method="POST",
        //      data:{doctor_id:receiver_message_id, message:message},
        //      dataType:'json',
        //      success:function(data){
        //          var html = '';
        //         for(var count = 0;count< data.length;count++)
        //          {
        //              html += '<div class="row" style="margin-left:0; margin-right:0">';
        //              if(data[count].message_direction == 'right')
        //              {
        //                  html += '<div align="left"><span class="text-muted"><small><b>'+data[count].time+'</b></small></span></div>';
        //                  html += '<div class="col-md-10 alert alert-warning">';

        //              }
        //              else{
        //                 html += '<div align="right"><span class="text-muted"><small><b>'+data[count].time+'</b></small></span></div>';
        //                 html += '<div class="col-md-2>&nbps;</div>';
        //                 html += '<div class="col-md-2 alert alert-info">';



        //              }

        //              html += data[count].message +'</div></div>';

        //          } 

        //          $('#chat_area').html(html);

        //      }
        //   });

        //     }

        // setInterval(function(){
        //     if(receiver_message_id > 0)        
        //     {
        //         load_chat_data(receiver_message_id,'yes');
        //     }
        // },5000);
        </script>
        <script src="js/chat.js">

        </script>