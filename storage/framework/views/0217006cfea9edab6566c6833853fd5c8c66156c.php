<?php $__env->startSection('content'); ?>
<head>
    <script>
        var today = new Date();
        var todayDate = (today.getMonth() + 1) + '/' + today.getDate() + '/' + today.getFullYear();
        var timezone = -(today.getTimezoneOffset()/60);
        
        function getDateTime(timestamp = null) {
            if(timestamp === null) {
                var datetime = new Date();
            }
            else {
                var datetime = new Date(timestamp * 1000);
                datetime.setHours(datetime.getHours() + timezone);
            }
            var date = (datetime.getMonth() + 1) + '/' + datetime.getDate() + '/' + datetime.getFullYear();
            var time = (datetime.getHours() % 12 || 12) + ':' + ((datetime.getMinutes() < 10) ? ('0' + datetime.getMinutes()) : datetime.getMinutes())  + ' ' + (datetime.getHours() >= 12 ? 'PM' : 'AM');
            if(date == todayDate) {
                return time;
            }
            else {
                return date + ' ' + time;
            }
        }
    </script>
</head>
    <link href="<?php echo e(asset('public/css') . '/chat-room.css'); ?>" rel="stylesheet">
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container" style="max-width:100vw;">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Chat Messenger</h4>
				</div>
				<?php if(isset($chatroom->project)): ?>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="<?php echo e(url('projects/show').'/'.$chatroom->project->id); ?>" class="btn btn-info m-l-15" title="">
							Back to Project
						</a>
					</div>
				</div>
				<?php endif; ?>
			</div>
				<div id="chat-wrap" class="col-12" style="font-family: Poppins,sans-serif;padding:0 30px;">
					<div class="card m-b-0" style="padding:0;">
						<!-- .chat-row -->
						 <?php 
									if($chatroom != 'null') {
									    $client = App\User::find($chatroom->owner_id);
									    $guest = App\User::find($chatroom->guest_id);
									}
									?>
						<div id="mobile-guest" class="chat-main-box" style="display:none;padding: 10px 0;text-align: center;border-bottom: 1px solid #d4d4d4;">
						    <div id="chat-menu" style="display: inline-block;float: left;padding: 8px;cursor: pointer;"><i class="fas fa-bars" style="float:left;font-size:20px;"></i></div>
						    <div id="chat-close" style="display: inline-block;float: left;padding: 8px;display:none;cursor: pointer;"><i class="fas fa-chevron-left" style="float:left;font-size:20px;"></i></div>
						    <?php if($chatroom != 'null' && Auth::user()->id == $client->id): ?>
						    <div>
						        <div id="<?php echo e($chatroom->guest_id); ?>" data-avatar="<?php echo e($guest->avatar); ?>" data-name="<?php echo e($guest->profile->first_name . ' ' . $guest->profile->last_name); ?>"  data-link="<?php echo e($guest->profile->id); ?>" data-side="" data-float="float:left;">
						            <img src="<?php echo e($guest->avatar); ?>" width="45px" height="45px" class="chat-img" style="margin-right: 15px;border-radius: 100%;margin-top:-8px;"/><span style="font-size:20px;margin-top:10px;display:inline-block;"><?php echo e($guest->profile->first_name . ' ' . $guest->profile->last_name); ?></span>
						        </div>
						    </div>
						    <?php elseif($chatroom != 'null'): ?>
						    <div id="<?php echo e($chatroom->owner_id); ?>" data-avatar="<?php echo e($client->avatar); ?>" data-name="<?php echo e($client->profile->first_name . ' ' . $client->profile->last_name); ?>" data-link="<?php echo e($client->profile->id); ?>" data-side="reverse" data-float="">
						        <img src="<?php echo e($client->avatar); ?>" width="45px" height="45px" style="margin-right: 15px;border-radius: 100%;margin-top:-8px;" /><span style="font-size:20px;margin-top:10px;display:inline-block;"><?php echo e($client->profile->first_name . ' ' . $client->profile->last_name); ?></span>
						    </div>
						    <?php endif; ?>
						</div>    
						<div class="chat-main-box">
							<div class="chat-left-aside" style="overflow:auto;">
							    <div class="chat-left-inner" style="height: 666px;">
                                    <div class="form-material">
                                        <input id="contact-search" class="form-control p-2" type="text" placeholder="Search Contact">
                                    </div>
                                    <ul class="chatonline style-none ps--theme_default" style="list-style:none; padding:0;">
                                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="contact" style="background-color: <?php echo e($contact['id'] == $id ? '#f8f9fa' : 'white'); ?>!important;cursor: pointer;">
                                            <a href="<?php echo e(asset('chat-rooms') . '/' . $contact['id']); ?>" data-id="<?php echo e($contact['id']); ?>"><img src="<?php echo e($contact['picture']); ?>" class="img-circle" style="margin: 0 20px 0 20px;"> <span class="contact-name" data-name="<?php echo e($contact['name']); ?>" style="color:black!important;"><?php echo e($contact['name']); ?>

                                            <small class="text-success"><script>document.write(getDateTime(<?php echo $contact['last_updated'] ?>))</script></small>
                                            </span></a>
                                        </li>
                    			        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                			        <!--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>-->
                                    <!--<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>-->
                                </div>
							</div>
							<!-- .chat-right-panel -->
							<div class="chat-right-aside">
								<div class="chat-main-header">
									<div class="p-3 b-b">
										<h4 class="box-title" style="font-family: Poppins,sans-serif; font-weight:inherit;">Chat Message <?php echo e(isset($chatroom->project) ? ' - ' . $chatroom->project->title : ''); ?></h4>
									</div>
								</div>
								<div class="chat-rbox" id="chat_div" style="overflow-y: auto; height: 450px" data-ps-id="6af3a2b4-4d10-fe58-9f61-dc84b7bcd401">
								   
									<?php if($chatroom != 'null' && Auth::user()->id == $chatroom->owner_id): ?>
									<div id="<?php echo e($chatroom->owner_id); ?>" data-avatar="<?php echo e($client->avatar); ?>" data-name="<?php echo e($client->profile->first_name . ' ' . $client->profile->last_name); ?>" data-link="<?php echo e($client->profile->id); ?>" data-side="reverse" data-float=""></div>
                                    <div id="<?php echo e($chatroom->guest_id); ?>" data-avatar="<?php echo e($guest->avatar); ?>" data-name="<?php echo e($guest->profile->first_name . ' ' . $guest->profile->last_name); ?>"  data-link="<?php echo e($guest->profile->id); ?>" data-side="" data-float="float:left;"></div>
									<?php elseif($chatroom != 'null'): ?>
									<div id="<?php echo e($chatroom->owner_id); ?>" data-avatar="<?php echo e($client->avatar); ?>" data-name="<?php echo e($client->profile->first_name . ' ' . $client->profile->last_name); ?>" data-link="<?php echo e($client->profile->id); ?>" data-side="" data-float="float:left;"></div>
                                    <div id="<?php echo e($chatroom->guest_id); ?>" data-avatar="<?php echo e($guest->avatar); ?>" data-name="<?php echo e($guest->profile->first_name . ' ' . $guest->profile->last_name); ?>"  data-link="<?php echo e($guest->profile->id); ?>" data-side="reverse" data-float=""></div>
                                    <?php endif; ?>
									<ul id="chat-list" class="chat-list" style="height: 486px;padding: 40px 25px;" data-id="<?php echo e(isset($chatroom->id) ? $chatroom->id : ''); ?>">
									
									<?php if($chats): ?>
											<?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li <?php if(Auth::user()->id != $chat->sent_to): ?>
												    class="message reverse"
												        <?php else: ?>
												    class="message"
												        <?php endif; ?>>
													<div class="chat-content">
														<h5><?php if($chatroom->owner_id != $chat->sent_to): ?>
															<a href="/profiles/show/<?php echo e($client->profile->id); ?>"><h5 style="color:#6c757d; font-family: Poppins,sans-serif; font-weight:300; font-size:18px;"><?php echo e($client->profile->first_name . ' ' . $client->profile->last_name); ?></h5></a>
															<?php else: ?>
															<a href="/profiles/show/<?php echo e($guest->profile->id); ?>"><div class="username"><h5 style="color:#6c757d; font-family: Poppins,sans-serif; font-weight:300; font-size:18px;"> <?php echo e($guest->profile->first_name . ' ' . $guest->profile->last_name); ?></h5></div></a>
															<?php endif; ?></h5>
														<div class="box bg-light-inverse"><?php echo $chat->message; ?>

														<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<?php if($file->message_id == $chat->id): ?>
																	<br><a href="/<?php echo e($file->file_path); ?>" target="_blank"><?php echo e($file->file_name); ?></a>
																<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div><br>
														<small style="color:#6c757d;"><script>document.write(getDateTime(<?php echo strtotime($chat->created_at . '+3 hours') ?>))</script></small>
													</div>
													<?php if(Auth::user()->id == $chat->sent_to): ?>
														<?php if($chatroom->owner_id == $chat->sent_to): ?>
														<div class="chat-img"  style="float:left;">
															<a href="/profiles/show/<?php echo e($guest->profile->id); ?>"><img src="<?php echo e(asset($guest->avatar)); ?>" alt></a>
													          <?php else: ?>
													     <div class="chat-img" style="float:left;">     
															<a href="/profiles/show/<?php echo e($client->profile->id); ?>"><img src="<?php echo e(asset($client->avatar)); ?>"  alt></a>
													    <?php endif; ?>
													</div>
													<?php else: ?>
													    <?php if($chatroom->owner_id == $chat->sent_to): ?>
														<div class="chat-img">
															<a href="/profiles/show/<?php echo e($guest->profile->id); ?>"><img src="<?php echo e(asset($guest->avatar)); ?>" alt></a>
													          <?php else: ?>
													     <div class="chat-img" >     
															<a href="/profiles/show/<?php echo e($client->profile->id); ?>"><img src="<?php echo e(asset($client->avatar)); ?>"  alt></a>
													    <?php endif; ?>
													<?php endif; ?>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</ul>
                                <!--<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>-->
                                <!--<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>-->
								</div>
								<div class="card-body border-top">
								<form action="" method="post" enctype="multipart/form-data">
									<?php echo e(csrf_field()); ?>

									<div class="row">
										<div class="col-md-9">
											<textarea placeholder="Type your message here" name="message" class="form-control border-1" id="text_message"></textarea>
											<p id="filename"></p>
										</div>
										<div id="send-att" class="col-md-1">
											<div class="upload_file"><i class="fa fa-paperclip" style="font-size:24px" aria-hidden="true"><input id="file_message" type="file" name="file" style="opacity: 0; margin-left: -30px; width: 50px"/></i></div>
											<div class="remove_file hide"><i class="fa fa-window-close" onclick="removeFile()" style="font-size:24px; color: indianred;" aria-hidden="true"></i> </div>
										</div>
										<div id="send-mobile" class="col-md-2 text-right">
											<button type="button" onclick="sendMessage()" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane" style="padding:0;"></i></button>
										</div>
									</div>
								</form>
								</div>
							</div>
							<!-- .chat-right-panel -->
						</div>
						<!-- /.chat-row -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<input id="baseURL" value="<?php echo e(url('')); ?>" type="hidden">
	<input id="chatroom_id" value="<?php echo e(isset($chatroom->id) ? $chatroom->id : ''); ?>" type="hidden">
	<input id="username" value="<?php echo e(Auth::user()->profile->first_name . ' ' . Auth::user()->profile->last_name); ?>" type="hidden">
	<input id="user_avatar" value="<?php echo e(Auth::user()->avatar); ?>" type="hidden">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

	<script>
	$("#chat-menu").click(function(){
      $(".chat-left-aside").css("left", "0");
      $(this).hide();
      $("#chat-close").show();
    });
	$("#chat-close").click(function(){
      $(".chat-left-aside").css("left", "-250px");
      $(this).hide();
      $("#chat-menu").show();
    });
	
              var baseURL = $('#baseURL').val();
              var container = $('#chat_div');
              container.scrollTop = 150;
              //console.log('ddd'+ container.offset());
              
              function sendMessage() {
                  if(<?php echo $chatroom ?> == 'null') {
                      return false;
                  }
                  var message = $('#text_message').val();
                  var file = $('#file_message').val();
                  var chatroom_id = $('#chatroom_id').val();
                  var attached_file = $('#file_message')[0].files[0];

                  if (message !== '' || attached_file) {
                      var formdata = new FormData();
                      if (file !== '') {
                          formdata.append('file', attached_file);
                      }
                      formdata.append('_token', '<?php echo e(csrf_token()); ?>');
                      formdata.append('chatroom_id', chatroom_id);
                      formdata.append('message', message);
                      
                      $('.upload_file').removeClass('hide');
                              $('#file_message').val(null);
                              $('.remove_file').addClass('hide');
                              $('#filename').html('');

                              $('#text_message').val('');
                              var username = $('#username').val();
                              var img_url = $('#user_avatar').val();
                              var new_message='';
                              if (file !== '') {
                                  new_message = '<li class="message reverse"><div class="chat-content"><h5 style="color:#6c757d; font-family: Poppins,sans-serif; font-weight:300; font-size:18px;">'+username+
                                      '</h5><div class="box bg-light-inverse">'+message+'<br><a href="'+baseURL+'/'+res.path+'" target="_blank">'+res.name+'</a>'+'</div><br><small style="color:#6c757d;">'+ getDateTime() + '</small></div><div class="chat-img"><img src="'+
                                      baseURL+img_url+'" alt="U"></div></li>';
                              } else {
                                  new_message = '<li class="message reverse"><div class="chat-content"><h5 style="color:#6c757d; font-family: Poppins,sans-serif; font-weight:300; font-size:18px;">'+username+
                                      '</h5><div class="box bg-light-inverse">'+message+'</div><br><small style="color:#6c757d;">'+ getDateTime() + '</small></div><div class="chat-img"><img src="'+
                                      baseURL+img_url+'" alt="U"></div></li>';
                              }

                              $('.chat-list').append(new_message);
                            $('#chat_div').scrollTop($('#chat_div')[0].scrollHeight);

                      $.ajax({
                          url: baseURL + '/chatroom-messages',
                          data: formdata,
                          processData: false,
                          contentType: false,
                          type: 'POST'
                      })
                  }
              }
              
              $('#text_message').keyup(function(e) {
                    if(e.which == 13) {
                        sendMessage();
                    }
              });

              $("#file_message").change(function() {
                  var attached_file = $('#file_message')[0].files[0];
                  $('.upload_file').addClass('hide');
                  $('.remove_file').removeClass('hide');
                  $('#filename').html(attached_file.name);
              });

              function removeFile() {
                  $('.upload_file').removeClass('hide');
                  $('#file_message').val(null);
                  $('.remove_file').addClass('hide');
                  $('#filename').html('');
              }
              
              function update() {
              $.ajax({
                    url: 'refresh',
                    type: "POST",
                    data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
						'id': $('#chat-list').data( "id" ),
				// 		'owner': $('#chat-list').data( "owner" ),
				// 		'guest': $('#chat-list').data( "guest" )
					},
                    success: function(data){
                        if(data.chats !== null) {
                            //console.log(data)
                            //-- clear the names wrapper
                            //$('#chat-list').html('');
                            
                            //-- loop through the results and create the new list view
                            $.each( data.chats, function( key, value ) {
                            //     ///-- add the result to the visual page
                            //console.log(value);
                            
                            var name = $('#'+value.created_by).data( "name" );
                            var image = $('#'+value.created_by).data( "avatar" );
                            var side = $('#'+value.created_by).data( "side" );
                            var float = $('#'+value.created_by).data( "float" );
                            var link = $('#'+value.created_by).data( "link" );
                            
                            var by = value.created_by;
                         
                            var file = '';
                            $.each( value.files, function( key, value ) {
                                
                                if(by === value.created_by) {
                                file += '<a href="/app/'+value.file_path+'" target="_blank">'+value.file_name+'</a></br>';
                                } else {
                                 file += ''; 
                                }
                            });    
                            
                                $('#chat-list').append('<li class="message"><div class="chat-content"><a href="/app/profiles/show/'+link+'"><h5 style="color:#6c757d; font-family: Poppins,sans-serif; font-weight:300; font-size:18px;">'+name+'</h5></a>'+
                                                        '<div class="box bg-light-inverse">'+value.message+'<br>'+ file +
                                                        '</div>'+
                                                        '<br>'+
    														'<small style="color:#6c757d;">'+ getDateTime(value.created_at) + '</small>'+
                                                        '</div>'+
    													'<div class="chat-img" style="float:left;"><a href="/app/profiles/show/'+link+'"><img src="'+image+'" alt=""></a></div></li>');
    													
                             });
                             
                             $('#chat_div').scrollTop($('#chat_div')[0].scrollHeight);
                        }
                    },
                    error:function(msg){
                        
                    }
                    });
              }
              
              $(document).ready(function(){
                 setInterval(update,5000);
                 
                 $('#contact-search').keyup(function() {
                    var search = $(this).val();
                    if(search.length == 0) {
                        $('.contact').show();
                    }
                    else {
                        $('.contact').each(function(i) {
                            if($(this).find('.contact-name').data('name').toLowerCase().indexOf(search) != -1) {
                                $(this).show();
                            }
                            else {
                                $(this).hide();
                            }
                        });
                    }
                 });
                 
                });
                
                 $('#chat_div').scrollTop($('#chat_div')[0].scrollHeight);
	</script>

<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/chat-rooms/index.blade.php ENDPATH**/ ?>