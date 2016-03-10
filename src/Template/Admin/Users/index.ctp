<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>

   <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                        </h1>
						
						<?php 
							############ Show Flash Message ##############
							$session = $this->request->session();
							if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
							############ End Flash Message ##############
						?>
						
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-user"></i>  <a href="index.html">User</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7">
					
					<div id="fade" class="black_overlay" style="display: block;"></div>
					<div class="inventory_det" id="light" style="display: block;">
					<div class="editaccountInfo">
						<div style="display: block;" id="light"> 
						<a class="change-image-close" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>   
						<div class="smalHead">
						CHANGE USER PICTURE
						</div>
						<form accept-charset="utf-8" method="post" id="AllusersinclassAdminAssignedUsersToClassPopupForm" class="edit_form" action="/inventory/admin/users/userclassesedit"><div style="display:none;"><input type="hidden" value="POST" name="_method"></div>			<div class="formRow addusertoclass">
						<div class="grid3"><label>Add User To Class :</label></div> 
						<div class="grid9">
						<ul class="token-input-list"><li class="token-input-token"><p>Amanda Memme</p><span class="token-input-delete-token">×</span></li><li class="token-input-token"><p>Kesha Frank</p><span class="token-input-delete-token">×</span></li><li class="token-input-token"><p>admin</p><span class="token-input-delete-token">×</span></li><li class="token-input-input-token"><input type="text" autocomplete="off" style="outline: medium none;" id="token-input-AllusersinclassUsers"><div style="position: absolute; top: -9999px; left: -9999px; width: auto; font-size: 11px; font-family: Arial,Helvetica,sans-serif; font-weight: 400; letter-spacing: normal; white-space: nowrap;"></div></li></ul><input type="text" name="blah" id="AllusersinclassUsers" style="display: none;">
						<input type="button" value="Submit" class="token_input">
						</div>
						</div>
						</form>     
						</div>            
					</div>    

<!--================== Added Autocomplete search with dynamic by Member ID-  T:307  =====================-->


<link href="/inventory/css/token-input.css" type="text/css" rel="stylesheet">


</div>	
						
						<?php	foreach ($logedinUser as $loguser): ?>
								<?php echo $this->Form->create($user, ['id'=>'userform']); ?>
									<div class="form-group">
										<label for="inputSuccess" class="control-label">Username</label>
										<?php echo $this->Form->input('username', array('label'=>false,  'disabled'=>'disabled', 'value'=>$loguser['username'], 'div'=>false, 'class'=>'form-control')); ?>
									</div>

									<div class="form-group">
										<label for="inputWarning" class="control-label">Email</label>
										<?php echo $this->Form->input('email', array('label'=>false, 'value'=>$loguser['email'], 'div'=>false, 'class'=>'form-control',  'placeholder'=>'Enter email address')); ?>
									</div>
									
									<div class="form-group">
										<label for="inputWarning" class="control-label">Password</label>
										<?php echo $this->Form->input('password', array('label'=>false, 'value'=>'', 'div'=>false, 'class'=>'form-control', 'placeholder'=>'Leave blank incase not edit')); ?>
									</div>
									
									<div class="form-group">
										<label for="inputWarning" class="control-label">Confirm Password</label>
										<?php echo $this->Form->input('confirm', array('label'=>false, 'type'=>'password', 'value'=>'', 'div'=>false, 'required'=>false, 'class'=>'form-control',  'placeholder'=>'Leave blank incase not edit')); ?>
									</div>
									

									<div class="form-group">
										<label for="inputError" class="control-label">Contact</label>
										<?php echo $this->Form->input('phone_no', array('label'=>false, 'value'=>$loguser['phone_no'], 'div'=>false, 'class'=>'form-control',  'placeholder'=>'Enter contact number')); ?>
									</div>
									
									<div class="form-group">
										<label for="inputError" class="control-label">Address</label>
										<?php echo $this->Form->input('address', array('type'=>'textarea', 'label'=>false, 'value'=>$loguser['address'], 'div'=>false, 'class'=>'form-control',  'placeholder'=>'Enter address detail')); ?>
									</div>
									
									<?php echo $this->Form->hidden('id', array('label'=>false, 'value'=>$loguser['id'], 'div'=>false, 'class'=>'form-control')); ?>
									<button class="btn btn-default" type="submit">Submit Button</button>
								<?php echo $this->Form->end(); ?>
								
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript">
			$('#userform').validate({
				rules: {
						confirm: {
						equalTo: "#password"
					}
				}
			});
		</script>
    </div>
</body>
</html>