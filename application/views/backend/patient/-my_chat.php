<section id="main" class="bg-dark">
		<div id="chat_user_list">
			<!-- <div id="owner_profile_details">
				<div id="owner_avtar" style="background-image: url('../upload/<?php echo $image;?>'); background-size: 100% 100%">
					<div>
						<div id="online"></div>
					</div>
				</div>
				<div id="owner_profile_text" class="">
					<h6 id="owner_profile_name" class="m-0 p-0"><?php echo $name;?></h6>
					<div id="bio">
						<p id="owner_profile_bio" class="m-0 p-0"></p>
						<i class="fas fa-edit" id="edit_icon"></i>
					</div>
					<a class="text-decoration-none" href="" id="logout" style="color:#e86663;"><i class="fa fa-power-off"></i> Logout</a>
				</div>
			</div> -->
			<div id="search_box_container" class="py-3">
				<input type="text" name="txt_search" class="form-control" autocomplete="off" placeholder="Search User" id="search">
			</div>
			<hr/>
			<div id="user_list" class="py-3">
			</div>
		</div>
		<div id="chatbox">
			<div id="data_container" class="">
				<div id="bg_image"></div>
				<h2 class="mt-0">Hi There! Welcome To</h2>
				<h2>Real-Time Chat Application</h2>
				<p class="text-center my-2">Connect to your device via Internet. Remember that you <br> must have a stable Internet Connection for a<br> greater experience.</p>
			</div>
			<div class="chatting_section" id="chat_area" style="display: none">
				<div id="header" class="py-2">
					<div id="name_details" class="pt-2">
						<div id="chat_profile_image" class="mx-2" style="background-size: 100% 100%">
							<div id="online"></div>
						</div>
						<div id="name_last_seen">
							<h6 class="m-0 pt-2"></h6>
							<p class="m-0 py-1"></p>
						</div>
					</div>
					<div id="icons" class="px-4 pt-2">
						<div id="send_mail">
							<a href="" id="mail_link"><i class="fas fa-envelope text-dark"></i></a>
						</div>
						<div id="details_btn" class="ml-3">
							<i class="fas fa-info-circle text-dark"></i>
						</div>
					</div>
				</div>
				<div id="chat_message_area">

				</div>
				<div id="messageBar" class="py-4 px-4">
					<div id="textBox_attachment_emoji_container">
						<div id="text_box_message">
							<input type="text" maxlength = "200" name="txt_message" id="messageText" class="form-control" placeholder="Type your message">
						</div>
						<div id="text_counter">
							<p id="count_text" class="m-0 p-0"></p>
						</div>
					</div>
					<div id="sendButtonContainer">
						<button class="btn" id="send_message">
							<span class="material-icons">send</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div id="details_of_user">
			<div id="user_details_container_avtar" style="background-size: 100% 100%"></div>
			<h5 class="text-justify" id="details_of_name"></h5>
			<p class="text-justify" id="details_of_bio"></p>
			<div id="user_details_container_details">
				<p class="text-justify" id="details_of_created"></p>
				<p class="text-justify" id="details_of_birthday"></p>
				<p class="text-justify" id="details_of_mobile"><span></p>
				<p class="text-justify" id="details_of_email"><span></p>
				<p class="text-justify" id="details_of_location"><span></p>
			</div>
			<button class="btn btn-danger" id="btn_block">Block User</button>
		</div>
	</section>

	<!-- <div id="chat_area" class="chat_conversation chat_converse"
                                    style="margin-left:10px; max-height:320px; overflow-y:scroll;">
                                    <?php 
                     $select_all_messages_from_chat_table = $this->crud_model->get_chat_messages();
                    //  $select_messages_from_chat_table = $this->db->get('chat')->result_array();
                      foreach ($select_messages_from_chat_table as $key => $messages_selected):
                        $user_list = explode('-', $messages_selected['message_sent_by'] );
                        $user_login_type = $user_list[1];
                        // $user_login_id = $user_list[1];
                        // echo $this->db->get_where($user_login_type, array($user_login_type.'_id' => $user_login_id))->row()->name;
                      
                      ?>

                                    <?php 
                    //   if($user_login_type['message_sent_by'] != $this->session->userdata('login_type').'-'. $this->session->userdata('login_user_id')):
                       ?>
            

                                    <span class="chat_message_item chat_msg_item_sender">
                                        <?php 
                            echo $messages_selected['message'];
                            

                            ?>

                                    </span>
                                    <?php 
                                // endif; ?>

                                    <?php 
                                    // if($user_login_type['message_sent_by'] = $this->session->userdata('login_type').'-'. $this->session->userdata('login_user_id')): ?>

                                    <span class="chat_message_item chat_msg_item_receiver">

                                        <?php 
                            // echo $messages_selected['message'];?>
                            


                                    </span>
                                    <?php 
                                // endif; ?>

                                    <?php endforeach;?>
                                </div>-->

    <script>
//Main funtion which will run at the time of page load
	//UserSidebarIn
	function barIn() {
		$('#details_of_user').css('width', '20%');
		$('#chatbox').css('width', '55%');
		$('#details_of_user').children().show();
	}
	//UserSidebarOut
	function barOut() {
		$('#details_of_user').children().hide();
		$('#details_of_user').css('width', '0');
		$('#chatbox').css('width', '75%');
	}

	//getting all user list except me
	function getUserList() {
		return new Promise(function (resolve, reject) { //Creating new Promise Chain
			$.ajax({
				url: '<?php echo base_url();?>Message/allUser',
				type: 'get',
				async: false,
				success: function (data) {
					if (data != "") {
						resolve(data);
					}
				}
			})
		}).then(function (data) { //This function setting the user list
			document.getElementById('user_list').innerHTML = data; //setting data to the user list
			$.get('<?php echo base_url();?>Message/ownerDetails', function (data) {
				jsonData = JSON.parse(data);
				// dob = jsonData[0]['dob'];
				phone = jsonData[0]['phone'];
				addr = jsonData[0]['address'];
				// bio = jsonData[0]['bio'];
				// if (dob.length != 0 && addr.length != 0 && phone.length != 0 && bio.length != 0) {
				// 	owenerProfileBio.classList.remove('text-warning');
				// 	owenerProfileBio.innerHTML = (bio.length > 28) ? bio.slice(0, 28) + "..." : bio;
				// } else {
				// 	owenerProfileBio.innerHTML = "Profile isn't completed";
				// 	owenerProfileBio.classList.add('text-warning');
				// }
			})
			$('.innerBox').click(function () {

				barIn();
				$('.chatting_section').css('display', '');

				unique_id = $(this).find('#user_avtar').children('#hidden_id').val();
				bg_image = $(this).find('#user_avtar').css('background-image').split('"')[1];

				clearInterval(inter);
				clearInterval(inter3);

				getBlockUserData();
				setInterval(getBlockUserData, 100);

				getUserDetails(unique_id);
				inter2 = setInterval(getUserList, 1000);
				inter3 = setInterval(function () {
					getUserDetails(unique_id)
				}, 1000);
				sendUserUniqIDForMsg(unique_id, bg_image);

				inter = setInterval(function () {
					sendUserUniqIDForMsg(unique_id, bg_image);
				}, 100);
			})
			$('.innerBox').mouseover(function () {
				clearInterval(inter2);
			})
			$('.innerBox').mouseleave(function () {
				inter2 = setInterval(getUserList, 1000);
			})
		})
	}

	$('#search').keyup(function (e) {
		var user = document.querySelectorAll('.doctor');
		var name = document.querySelectorAll('.doctor');
		// var name = document.querySelectorAll('#user_list h6');
		var val = this.value.toLowerCase();
		if (val.length > 0) {
			clearInterval(inter2);
			for (let i = 0; i < user.length; i++) {
				nameVal = name[i].innerHTML
				if (nameVal.toLowerCase().indexOf(val) > -1) {
					user[i].style.display = '';
				} else {
					user[i].style.display = 'none';
				}
			}
		} else {
			inter2 = setInterval(getUserList, 1000);
		}
	});

	

    </script>