<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chat_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }


/**************************** The function below insert into bank and teacher tables   **************************** */
    function insertApplicantFunction(){
        // session_start();
        // $clinic_id = $this->session->userdata('clinic_id');
        // $admin_id = $this->session->userdata('admin_id');


        $page_data = array(
            // 'clinic_id' => $this->session->userdata('clinic_id'),
            'message'           => $this->input->post('message'),
			'chat_date'        => $this->input->post('d-m-Y H:i'),
			// //'chat_password'       => $this->input->post('chat_password'),
            // // 'sender_message_id'              => $this->session->userdata('admin_id'),
            'doctor_id'              => $this->input->post('doctor_id'),
            'patient_id'          => $this->input->post('patient_id'),
            'patient_name'          => $this->input->post('patient_name'),
            'doctor_name'          => $this->input->post('doctor_name'),
            'message_sent_by'           => $this->session->userdata('login_type')
            // 'message_sent_by'   => $this->input->post('patient_id')


            );


            $this->db->insert('chat', $page_data);


    }


    // function updatechatFunction($param2){

    //     $page_data = array(
    //         'chat_name'           => $this->input->post('chat_name'),
	// 		//'date_created'        => $this->input->post('date_created'),
	// 		//'chat_password'       => $this->input->post('chat_password'),

    //         );

    //         $this->db->where('chatroomid', $param2);
    //         $this->db->update('chatroom', $page_data);
    // }


    function updatechatFunction($param2){

        $page_data = array(
            'message'           => $this->input->post('message'),
			//'date_created'        => $this->input->post('date_created'),
			//'chat_password'       => $this->input->post('chat_password'),

            );

            $this->db->where('chat_id', $param2);
            $this->db->update('chat', $page_data);
    }


    function deletechatFunction($param2){

        $this->db->where('chatroomid', $param2);
        $this->db->delete('chatroom');
    }
    function createData($data)
    {


        $query = $this->db->insert('chat',$data);
        return $query;
    }






    // function update_chat_message_status($user_id)
    // {

    //     $data = array('chat_message_status' =>'yes');
    //     $this->db->where('receiver_message_id',$user_id);
    //     $this->db->where('chat_message_status','no');
    //     $this->db->update('message',$data);


    // }

    function selectChatStaffInsert(){
        $staff = $this->session->userdata('login_type').'-'.$this->session->userdata('login_user_id');
        $sql = "select * from chat where user_id='".$staff."' order by chat_id asc";
        return $this->db->query($sql)->result_array();
    }


    function fetch_chat_data($patient_id, $doctor_id){
        // $sender_message_id = mysqli_real_escape_string($conn, $_POST['sender_message_id']);
        // $receiver_message_id = 9;
        // $output= "";
        // $sql = "select * FROM chat WHERE (sender_message_id = {$sender_message_id} AND receiver_message_id = {$receiver_message_id})
        // OR(sender_message_id = {$receiver_message_id} AND receiver_message_id = {$sender_message_id} ) ORDER BY chat_id DESC";
        // $query = mysqli_query($conn,$sql);
        // if(mysqli_num_rows($query)> 0){
        //     while($row = mysqli_fetch_assoc($query)){
        //         if($row['sender_message_id'] === $sender_message_id){
        //             $output.=   ' <div class="chat_outgoing">
        //                             <div class="details">
        //                                 <p>'.$row['message'].'</p>
        //                             </div>
        //                         </div>';

        //         }
        //         else{
        //             $output.=   ' <div class="chat_incoming">
        //             <div class="details">
        //                 <p>'.$row['message'].'</p>
        //             </div>
        //         </div>';

        //         }
        //     }
        //     echo $output;
        // }


        // $this->db->where('(sender_message_id = "'.$patient_id.'" OR sender_message_id="'.$doctor_id.'")');
        // $this->db->where('(receiver_message_id = "'.$doctor_id.'" OR receiver_message_id="'.$patient_id.'")');
        $this->db->orderby('chat_id','ASC');
        return $this->db->get('chat');

    }


    function selectchatdoctorbydoctorId(){
        $receivedoctor = $this->db->get_where('chat', array('doctor_id' => $this->session->userdata('doctor_id')))->row()->doctor_id;
        $sendpatient = $this->db->get_where('chat', array('patient_id' => $this->session->userdata('patient_id')))->row()->patient_id;


        $sql = "select * from chat where doctor_id ='".$receivedoctor."' and patient_id='".$sendpatient."' order by chat_id asc";
        return $this->db->query($sql)->result_array();

        // $patient_id = $this->session->userdata('patient_id');
        // $doctor_id = $this->session->userdata('doctor_id');


        // $this->db->where('(patient_id = "'.$patient_id.'")');
        // $this->db->where('(doctor_id = "'.$doctor_id.'")');
        // $this->db->orderby('chatid','ASC');
        // return $this->db->get('chat');
    }

    function selectJitsipatientbypatientId(){
        $studentClasspatient = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->row()->patient_id;
        // $patientsubgroup = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->row()->subgroup_id;

        $sql = "select * from jitsi where patient_id='".$studentClasspatient."'  order by jitsi_id asc";
        return $this->db->query($sql)->result_array();
    }


    function list_all_chat_and_order_with_chatid($patient_id,$doctor_id){

            $receivedoctor = $this->db->get_where('chat', array('doctor_id' => $doctor_id))->row()->doctor_id;
            $sendpatient = $this->db->get_where('chat', array('patient_id' =>  $patient_id))->row()->patient_id;
            $sql = "select * from chat where doctor_id ='".$receivedoctor."' and patient_id='".$sendpatient."' order by chat_id asc";
            return $this->db->query($sql)->result_array();

        }

        function list_all_chat_and_order_with_chatid1($patient_id,$doctor_id){

                $receivetopatient = $this->db->get_where('chat', array('patient_id' => $patient_id))->row()->patient_id;
                $sendbydoctor = $this->db->get_where('chat', array('doctor_id' =>  $doctor_id))->row()->doctor_id;
                $sql = "select * from chat where doctor_id ='".$sendbydoctor."' and patient_id='".$receivetopatient."' order by chat_id asc";
                return $this->db->query($sql)->result_array();


            }

            function insertChatRequest(){
                $page_data = array(

            'patient_id'           => $this->input->post('patient_id'),
            'patient_name'           => $this->input->post('patient_name'),
            'doctor_name'           => $this->input->post('doctor_name'),
            'doctor_id'           => $this->input->post('doctor_id'),
            'status'           => $this->input->post('status'),



                );

                $this->db->insert('chat_request', $page_data);
            }


            function updateChatRequest( $param2){

                $page_data = array(
                    // 'patient_id'           => $this->input->post('patient_id'),
                    // 'doctor_id'           => $this->input->post('doctor_id'),
                    'status'           => $this->input->post('status'),

                    //'date_created'        => $this->input->post('date_created'),
                    //'chat_password'       => $this->input->post('chat_password'),

                    );
        // $page_data['patient_id']  = html_escape($this->input->post('patient_id'));
        // $page_data['doctor_id']  = html_escape($this->input->post('doctor_id'));


                    $this->db->where('chat_request_id', $param2);
                    $this->db->update('chat_request', $page_data);

            }


            function selectChatrequestpatientbypatientId(){
                $studentClasspatient = $this->db->get_where('doctor', array('doctor_id' => $this->session->userdata('doctor_id')))->row()->doctor_id;
                // $patientsubgroup = $this->db->get_where('patient', array('patient_id' => $this->session->userdata('patient_id')))->row()->subgroup_id;

                $sql = "select * from chat_request where patient_id='".$studentClasspatient."'  order by chat_request_id asc";
                return $this->db->query($sql)->result_array();
            }
function retrive_patient_name_from_patient_name(){

   $sql= "select * from patient inner join chat_request on patient.patient_id=chat_request.patient_id";
   return $this->db->query($sql)->result_array();
}

            function list_all_patient_and_order_with_chat_request($doctor_id){

                // $patient_name= $this->session->userdata('patient_name');
                $doctor_id= $this->session->userdata('doctor_id');

                $receivetopatient = $this->db->get_where('chat_request', array('doctor_id' => $doctor_id))->row()->doctor_id;
                // $patient_name = $this->db->get_where('patient', array('name' =>   $patient_name))->row()->patient_name;
                $sql = "select * from chat_request where doctor_id ='". $receivetopatient."' order by chat_request_id asc";
                // return $this->db->query($sql)->result_array();

                $data = array();
                // $sql = "select  * from chat_request order by doctor_id asc limit 0,20";
                $all_patient_selected = $this->db->query($sql)->result_array();
                foreach($all_patient_selected as $key => $selected_patients_from_patient_table){
                    $patient_id = $selected_patients_from_patient_table['patient_id'];
                    $face_file = 'uploads/patient_image/'. $patient_id . '.jpg';
                    if(!file_exists($face_file)){
                        $face_file = 'uploads/patient_image/default_image.jpg/';
                    }

                    $selected_patients_from_patient_table['face_file'] = base_url() . $face_file;
                    array_push($data, $selected_patients_from_patient_table);
                }

                return $data;
            }

            function list_all_doctor_who_accepted_chat_request($patient_id){

                $patient_id= $this->session->userdata('patient_id');
                $doctor_id= $this->session->userdata('doctor_id');

                // $receivetopatient = $this->db->get_where('chat_request', array('doctor_id' => $doctor_id))->row()->doctor_id;
                $sendbydoctor = $this->db->get_where('chat_request', array('patient_id' =>   $patient_id))->row()->patient_id;
                $sql = "select * from chat_request where patient_id ='". $sendbydoctor."' order by chat_request_id asc";
                // return $this->db->query($sql)->result_array();

                $data = array();
                // $sql = "select  * from chat_request order by doctor_id asc limit 0,20";
                $all_patient_selected = $this->db->query($sql)->result_array();
                foreach($all_patient_selected as $key => $selected_patients_from_patient_table){
                    $patient_id = $selected_patients_from_patient_table['patient_id'];
                    $face_file = 'uploads/patient_image/'. $patient_id . '.jpg';
                    if(!file_exists($face_file)){
                        $face_file = 'uploads/patient_image/default_image.jpg/';
                    }

                    $selected_patients_from_patient_table['face_file'] = base_url() . $face_file;
                    array_push($data, $selected_patients_from_patient_table);
                }

                return $data;
            }



    function toSelectFromchatRequestWithId($chat_request_id){
        $sql = "select * from chat_request where chat_request_id ='".$chat_request_id."'";
        return $this->db->query($sql)->result_array();
    }



    function fetch_chat_status_from_doctor($patient_id,$doctor_id){

        $receivedoctor = $this->db->get_where('chat_request', array('doctor_id' => $doctor_id))->row()->doctor_id;
        $sendpatient = $this->db->get_where('chat_request', array('patient_id' =>  $patient_id))->row()->patient_id;
        $sql = "select * from chat_request where doctor_id ='".$receivedoctor."' and patient_id='".$sendpatient."' order by chat_request_id asc";
        return $this->db->query($sql)->result_array();

    }
}


  ?>