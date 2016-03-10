<?php echo $this->Element('admin/adminHeader');?>
<?php echo $this->Element('admin/adminSidebar');?>
	<style>.errors{color:red;}</style>
	<div id="main" role="main">
		<div id="ribbon">
			<ol class="breadcrumb"><li><?php echo $this->Html->link('Dashboard', '/admin/dashboard'); ?></li><li>Add Booking</li></ol>
		</div>
		<div id="content">
			<div class="row">
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
					<h1 class="page-title txt-color-blueDark"><i class="fa fa-table fa-fw "></i><span>Add Booking</span></h1>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8"></div>
			</div>
			<?php 
			############ Show Flash Message ##############
			$session = $this->request->session();
			if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
			############ End Flash Message ##############
			?>
			<section id="widget-grid" class="">
				<div class="row">
					<article class="col-sm-12 col-md-12 col-lg-1"></article>
					<article class="col-sm-12 col-md-12 col-lg-9">
						<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">						
							<form class="form-horizontal" id="addbooking" name="addbooking" method="post">
								<fieldset>
									<article class="col-sm-7">
										<legend>What</legend>
										<div class="form-group">
											<label class="col-md-2 control-label">Frequency </label>
											<div class="col-md-10">
												<select  required=""  name="frequency_id" class="form-control">
													<option selected="" value=""> Select  Frequency  </option>
													<?php	foreach($frequencyList as $val) { ?>
													<option  value="<?php echo $val->id;?>"> <?php echo $val->request_frequency_name;?>  </option>
														<?php }
													?>		
												</select>													
											</div>
										</div>											
										<div class="form-group">
											<label class="col-md-2 control-label">select Yards</label>
											<div class="col-md-10">
												<select  required=""  name="service_size"   class="form-control" id="yadrs_id">
													<option selected="" value=""> Select service size </option>
													<?php	foreach($getyards as $val) { ?>
													<option  value="<?php echo $val->id;?>"> <?php echo $val->yards;?>  </option>
														<?php }
													?>		
												</select>
											</div>
										</div>											
										<div class="form-group">
											<label class="col-md-2 control-label">Services</label>
											<div class="col-md-10">
												<select required=""  class="form-control"  name="pp_services_id"  onchange="getExtraServices(this)" >
													<option selected="" value="">Select service </option>
													<?php foreach($serviceList as $serviceVal) { ?>
													<option  value="<?php echo $serviceVal->id;?>"> <?php echo $serviceVal->service;?>  </option>
														<?php }
													?>		
												</select> 	
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label"></label>
											<div class="col-md-10" id="extra-service-loader"></div>
										</div>
									</article>
									<article class="col-sm-5">
										<legend>Summary</legend>
										<div class="form-group" style="background: rgb(204, 204, 204) none repeat scroll 0% 0%; height: 139px;padding:4px;">
											<label class="col-md-4 control-label">Service</label>
											<div class="col-md-8">
													<input type="text" class="service_charge form-control" name="service_charge" id="service_charge" value="$00.00" readonly style="text-align:right">
													<input type="hidden" name="customer_type" id="customer_type" value="customer_type">
											</div>
											
											<label class="col-md-4 control-label">Extras</label>
											<div class="col-md-8">
													<input type="text" class="extra_fee form-control" name="service_charge" id="extra_fee" value="$0.00" readonly style="text-align:right">
											</div>
											
											<label class="col-md-4 control-label">Discount</label>
											<div class="col-md-8">
													<input type="text" class="tip form-control"  name="service_charge" id="discount"  value="$0.00" readonly style="text-align:right">
											</div>
											

											<label class="col-md-4 control-label">Tip</label>
											<div class="col-md-8">
													<input type="text" class="tip form-control"  name="service_charge" id="tip"  value="$0.00" readonly style="text-align:right">
											</div>
										</div>											
										<div class="form-actions">
											<div class="row">
													<label class="col-md-4 control-label" style="padding: 0;">
														<strong>Total: </strong>
													</label>
												<div class="col-md-4" id="total_ammount"><strong>$00.00</strong></div>
												<input type="hidden" name="payable_money" id="payable_money">
												<input type="hidden" name="extra_service_list" id="extra_service_list">

											</div>
										</div>	
										<div class="form-actions"></div>
									</article>
								</fieldset>									
								<fieldset>
									<fieldset>
										<div class="form-group">
											<label for="select-1" class="col-md-2 control-label">Discount Code</label>
											<div class="input-group">
													<input type="text" class="form-control" id="discount_value" name="discount_code" onchange="get_discount()">
													<span class="input-group-addon"><i class="fa fa-check"></i></span>
												</div>
										</div>
										<div class="form-group">
											<label for="select-1" class="col-md-2 control-label">Tip</label>
											<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
													<input type="text" class="form-control" id="tip_value" name="tip_value" onchange="getTip()">
													<span class="input-group-addon"><i class="fa fa-check"></i></span>
												</div>
										</div>
									</fieldset>										
										<!--  ######################### Payment Information ############################  -->
									<fieldset id="paymnt_info">
										<legend>Payment Information</legend>
										<div class="form-group">
											<label class="col-md-2 control-label">Credit Card </label>
											<div class="col-md-10">
												<input type="text" name="credit_card_no" class="credit_card_no form-control" placeholder="XXXX-XXXX-XXXX-XXXX" >
											</div>
										</div>										
										<div class="form-group">
											<label class="col-md-2 control-label">Card Type</label>
											<div class="col-md-10">
												<input type="text" name="card_name" class="card_name form-control"  placeholder="Card type">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">CVC</label>
											<div class="col-md-10">
												<input type="text" name="cvc" class="cvc form-control"  placeholder="CVC">
											</div>
										</div>										
										<div class="form-group">
											<label class="col-md-2 control-label">State</label>
												 <div class="col-md-10">
														<?php $month_options = '';
																	for( $i = 1; $i <= 12; $i++ ) {
																	$month_num = str_pad( $i, 2, 0, STR_PAD_LEFT );
																	$month_name = date( 'F', mktime( 0, 0, 0, $i + 1, 0, 0, 0 ) );
																	$month_options .= '<option value="' .  $month_num  . '">' . $month_name . '</option>';
																	}	
														?>
													<select    class="form-control"   name="expire_month_id">
														<option selected="" value=""> Exp Month </option>
														<?php echo $month_options; ?>
													</select> 	
												</div>	
										</div>										
										<div class="form-group">
											<label class="col-md-2 control-label">Exp year</label>
												 <div class="col-md-10">
												 
													<select   class="form-control"   name="expire_year">
														<option selected="" value=""> Exp year </option>
																 <?php  $y = date("Y");
																$n = (int)$y+10;
																for($i=$y; $i<$n; $i++){ ?>
															<option value="<?php  echo $i; ?>"><?php echo $i; ?></option>
																<?php	}?>
													</select> 	
												</div>	
										</div>										
									</fieldset>
									<!--  ######################### When ############################  -->									
									<fieldset>
										<legend>When</legend>
										<div class="form-group">
											<label class="col-md-2 control-label">Date / Time*</label>
											<div class="col-md-10">
												<input type="text" name="created_at" id="datepicker_select" class="street_address form-control" placeholder="DD/MM/YYYY HH:MM" required="">
											</div>
										</div>										
									</fieldset>										
									<!--  ######################### Comment Section ############################  -->
									<fieldset>
										<legend>Comments</legend>
										<!--div class="form-group">
											<label class="col-md-2 control-label">By Staff</label>
											<div class="col-md-10">
												<textarea class="comment_by_staff form-control" id="comment_by_staff" name="comment_by_staff"></textarea>
											</div>
										</div-->
										<div class="form-group">
											<label class="col-md-2 control-label">By Customer</label>
											<div class="col-md-10">
												<textarea name="customer_comment" id="comment_by_customer" class="comment_by_customer form-control"></textarea>	
											</div>
										</div>
									</fieldset>										
								</fieldset>									
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12" id="hidden_value"></div>
									</div>
								</div>									
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<button type="submit" onclick="submitFormData()" class="btn btn-primary">
												<i class="fa fa-save"></i>
												Submit
											</button>
										</div>
									</div>
								</div>
								</form>								
						</div>
				</div>
				</article>
		</section>
	</div>
</div>
<?php echo $this->Element('admin/adminFooter');?>		
<?php echo $this->Html->script('plugin/pace/pace.min.js'); ?>
<?php echo $this->Html->script('jquery.min.js'); ?>
<?php echo $this->Html->script('jquery-ui.min.js'); ?>
<?php echo $this->Html->script('app.config.js'); ?>
<?php echo $this->Html->script('plugin/jquery-touch/jquery.ui.touch-punch.min.js'); ?>
<?php echo $this->Html->script('bootstrap/bootstrap.min.js'); ?>
<?php echo $this->Html->script('notification/SmartNotification.min.js'); ?>
<?php echo $this->Html->script('smartwidgets/jarvis.widget.min.js'); ?>
<?php echo $this->Html->script('plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'); ?>
<?php echo $this->Html->script('plugin/sparkline/jquery.sparkline.min.js'); ?>
<?php echo $this->Html->script('plugin/masked-input/jquery.maskedinput.min.js'); ?>
<?php echo $this->Html->script('plugin/select2/select2.min.js'); ?>
<?php echo $this->Html->script('plugin/bootstrap-slider/bootstrap-slider.min.js'); ?>
<?php echo $this->Html->script('plugin/msie-fix/jquery.mb.browser.min.js'); ?>
<?php echo $this->Html->script('plugin/fastclick/fastclick.min.js'); ?>
<?php echo $this->Html->script('demo.min.js'); ?>
<?php //echo $this->Html->script('app.min.js'); ?>
<?php echo $this->Html->script('speech/voicecommand.min.js'); ?>
<?php echo $this->Html->script('smart-chat-ui/smart.chat.ui.min.js'); ?>
<?php echo $this->Html->script('smart-chat-ui/smart.chat.manager.min.js'); ?>
<!-- PAGE RELATED PLUGIN(S) -->
<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<?php echo $this->Html->script('plugin/datatables/jquery.dataTables.min.js'); ?>
<?php echo $this->Html->script('plugin/datatables/dataTables.colVis.min.js'); ?>
<?php echo $this->Html->script('plugin/datatables/dataTables.tableTools.min.js'); ?>
<?php echo $this->Html->script('plugin/datatables/dataTables.bootstrap.min.js'); ?>
<?php echo $this->Html->script('plugin/datatable-responsive/datatables.responsive.min.js'); ?>
<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<?php echo $this->Html->script('plugin/vectormap/jquery-jvectormap-1.2.2.min.js'); ?>
<?php echo $this->Html->script('plugin/vectormap/jquery-jvectormap-world-mill-en.js'); ?>
<?php echo $this->Html->css('admin/jquery-ui-timepicker-addon.css'); ?>
<?php echo $this->Html->css('admin/jquery-ui.css'); ?>

<?php echo $this->Html->script('jquery.validate.min.js'); ?>
<?php echo $this->Html->script('jquery-1.11.1.min.js'); ?>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<?php echo $this->Html->script('timepicker-addon.js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<script type="text/javascript">
	function submitFormData(){
	//var formData = $("#addbooking").serialize();
	var total_amount = $("#total_ammount").html();
	$("#payable_money").attr('value',total_amount);	
		$("#addbooking").validate({
			errorClass:"errors",
			rules: {
				"first_name":{required: true},
				"last_name":{required: true},
				//"email":{required:true,email: true,remote:'bookings/checkemailalreadyexist'},								
				"email":{required:true,email: true},								
				"street_address":{required:true},								
				"city":{required:true},								
				"state_id":{required:true},								
				"zip_code":{required: true,digits: true},								
				"mobile_no":{ required: true,digits: true,maxlength:11},								
				"frequency_id":{ required: true},								
				"pp_services_id":{ required: true},								
				"credit_card_no":{ required: true,digits: true, minlength: 16,maxlength:16},	
				"card_name":{ required: true},	
				"expire_month_id":{ required: true},	
				"expire_year":{ required: true},	
				"created_at":{ required: true}								
			},
			messages: {  
				"first_name": {required: "This field is required"},
				"last_name": {required: "This field is required"},
				//"email" : { required: "This field is required", email: "Please enter a valid email address", remote: "Email  already exist please try another email" },
				"email" : { required: "This field is required", email: "Please enter a valid email address"},
				"street_address" : { required: "This field is required"},
				"city" : { required: "This field is required"},
				"state_id" : { required: "Please select state first"},
				"zip_code" : { required: "Please select state first",digits: "This field can only contain digits"},
				"mobile_no" : { required: "This field is required" ,digits: "This field can only contain digits",maxlength: "This field contain only 11 digit"},
				"frequency_id" : { required: "Please select the Frequency"},
				"pp_services_id" : { required: "Please select the service"},
				"credit_card_no" : { required: "This field is required", digits: "This field can only contain digits", minlength: "This field must contain  16 digit", maxlength: "This field contain only 16 digit"},
				"card_name" : { required: "This field is required"},
				"expire_month_id" : { required: "Please select the expire month"},
				"expire_year" : { required: "Please select the expire year"},
				"created_at" : { required: "Please select the service date and time"},												
			},	
			// submitHandler: function (form)  {
				// var formData =   $(form).serialize();	 
				// $.ajax({
					// url: 'index',
					// type:'post', 
					// data : formData,
					// success:function(resp){
						// if(resp == 'true') {
								// alert("You have been successfully booked the service");
								// $('#addbooking')[0].reset();
						// } else if($.trim(resp)== 'false'){
							// alert('email already exist');
							// $("#test").html('<label id="abc" class="errors" style="margin-left:18%;">Email already exist</label>');
						// }
					// }
				// });
			// }
		});			
	}
	/*
	* Handeling the Assign Booking to Teams
	* By: T:307 on 08-02-2015   
	*/
	function asignBooking(id)  {
		if($('input:checkbox.selected-team:checked').length > 0){
			$(".summary").show();		
		}  else  {
			$(".summary").hide();	
		}
		var selectedCharges = [];
		$('input:checkbox.selected-team:checked').each(function() {
			var value = $(this).val();
			if ($("#selected_team_"+value).is(':checked')==true){
				$(".pull-right_"+value).show();
			}
		});		
		$("input:checkbox.selected-team:not(:checked)").each(function() {
			var value1 = $(this).val();
			$(".pull-right_"+value1).hide();
		});
	}

	/*
	* Handeling the extra service checkbox
	* According the checkbox the extra service price will be updated on the value board
	* By: T:307 on 08-02-2015   
	*/

	function getExtraServices(get) {
		var yard_id 	= $("#yadrs_id").val();
		var tip_value	= $("#tip_value").val();
		$.ajax({
			url: 'searchExtraService',
			type:'post', 
			beforeSend: function()  {
				$("#extra-service-loader").html('Loading....');
			},
			//data: 'id='+get.value+'&tip_value='+tip_value,
			data: 'id='+get.value+'&tip_value='+tip_value+'&yard_id='+yard_id,
			success:function(res)  {						
				if (res=='error') {
					//alert("Extra Service not found for this size");
					alert("Please select service yards first !");
				} else {
					//alert(res);
					var obj = $.parseJSON(res);
					var setCheckboxHtml = '';
					$.each(obj, function(key,value) {
						//var total_ammount = parseInt(value.service_amount) + parseInt(tip_value);
						var total_ammount = (value.service_amount) + (tip_value);
						setCheckboxHtml += '<div class="checkbox"><label><input name="extra_service" onclick="updateCharge('+value.extra_id+','+value.service_money_value+')"  value="'+value.service_money_value+'" type="checkbox" id="'+value.extra_id+'">'+value.name+'</label></div>';
						$("#service_charge").attr('value','$'+value.service_amount);
						$("#total_ammount").html('$'+total_ammount);
					});
					$("#extra-service-loader").html(setCheckboxHtml);  
				}
			}
		});
	}

	/*
	* Handeling the charge if update any
	* According the checkbox the extra service price will be updated on the value board
	* By: T:307 on 08-02-2015   
	*/

	//var guru = [];
	function updateCharge(id,serviceCharge){
		var extraServiceId = [];
		$('.checkbox :checked').each(function() {
			extraServiceId.push($(this).attr('id'));
		});
		$("#extra_service_list").attr('value',extraServiceId);	
		//console.log(new_ids);
		var tip_value = $("#tip_value").val();
		var service_charge = $("#service_charge").val();
		var extra_id = id;
		var selectedCharges = [];
		$('.checkbox :checked').each(function() {
			selectedCharges.push($(this).val());
		});
		//console.log(selectedCharges);	
	 	/* var selectedIds = [];
	 	$('.checkbox :checked').each(function() {
			selectedIds.push(extra_id);
		});
		alert(selectedIds);   */

		$.ajax({
			url: 'updateCharge',
			type:'post',
			beforeSend: function(){
			},
			data: 'id='+id+'&service_charge='+service_charge+'&extra_service_charge='+selectedCharges+'&tip_value='+tip_value,
			success:function(res){	
				console.log(res);
				var obj = $.parseJSON(res);
				$("#extra_fee").attr('value',+obj.extra_charge);
				$("#total_ammount").html('<strong>$'+obj.total_charge+'</strong>');
			}
		});
	}

	/*
	* Handeling the service detail with tip charge
	* According the service list the extra service list will be updated with the Tip charge
	* By: T:307 on 08-02-2015   
	*/

	function getTip(){
		var tip_value = $('#tip_value').val();
		var service_charge = $("#service_charge").val();
		var extra_fee = $("#extra_fee").val();
		var discount = $("#discount").val();
		 
		$.ajax({
			url: 'tip',
			type:'post',
			beforeSend: function(){
			},
			data: 'tip_value='+tip_value+'&service_charge='+service_charge+'&extra_fee='+extra_fee+'&discount='+discount,
			success:function(res){
				//alert(res);
				var obj = $.parseJSON(res);
				$("#tip").attr('value','$'+obj.tip_value);
				$("#total_ammount").html('<strong>$'+ obj.total_amount +'</strong>');
			}
		});	
	}

	function get_discount() {
		var discount_value = $('#discount_value').val();
		var tip_value = $('#tip_value').val();
		var service_charge = $("#service_charge").val();
		var extra_fee = $("#extra_fee").val();
		//alert(discount_value);
		$.ajax({
		url: 'discount',
			type:'post',
			data:'discount_value='+discount_value+'&tip_value='+tip_value+'&service_charge='+service_charge+'&extra_fee='+extra_fee,
			success:function(res)  {	
				var obj = $.parseJSON(res);
				$("#discount").attr('value',obj.diccount_value);
				$("#total_ammount").html('<strong>$'+obj.total_charge+'</strong>'); 
					if(obj.response == "Invalid discount coupon") {
						alert('Invalid discount coupon');
					}else if(obj.response == "Discount coupon has expire") {
							alert('Discount coupon has expire');
					}	
			
			}
		});
	};
	/*
	* Handeling the new and existing customer
	* Get the field date if customer exist
	* By: T:307 on 08-02-2015  
	*/
	function customer(id)
	{
		if(id=='existing_customer') {
		$("#paymnt_info").hide();
		$(".conditional-customer").html('<div class="form-group"><label class="col-md-2 control-label">Search customer</label><div class="col-md-10"><input id="ex-customer" type="text" class="form-control" required="" placeholder="Search customer by name or email " name="search_customer"></div></div><div class="form-group"><label class="col-md-2 control-label">First name</label><div class="col-md-10"><input type="text" name="first_name" class="first_name form-control" placeholder="First name"></div></div><div class="form-group"><label class="col-md-2 control-label">Last name</label><div class="col-md-10"><input type="text" name="last_name" class="last_name form-control" placeholder="Last name"></div></div><div class="form-group"><label class="col-md-2 control-label">Email</label><div class="col-md-10"><input type="email" name="email" class="email form-control" placeholder="E-mail"></div></div>')
				$( "#ex-customer" ).autocomplete({
					source: 'search',
					select: function(event, ui) {
							var data = $('#ex-customer').val(ui.item.value);
							$.ajax({
								url: 'search',
								type:'get',
								data: 'first_name='+ui.item.label,
								success:function(res){
									jsonstring = $.parseJSON(res);
									$(".first_name").attr('value',jsonstring.first_name);
									$(".last_name").attr('value',jsonstring.last_name);
									$(".email").attr('value',jsonstring.email);
								}
							});
							return false;
					} 
				});				
			}
			
	}	

	/*
	* Handeling some data with body onlaod 
	* Handling the date calender
	* Handling the search user and client
	* By: T:307 on 09-02-2015   
	* 
	*/
	$(document).ready(function() {
		$("#paymnt_info").hide();	
		$("#flash_notification").click(function(){
				//$(this).remove();
				$(this).slideUp();
		});	
		$('.slimScrollDiv input[type="text"]').change(function(){
			var inputbox = [];
			var value = 0;
			$('.slimScrollDiv input[type="text"]').each(function(i, item) {
				if($(this).val()>0){
						value += Number($(this).val());
				}
			});
			var companyShare = 100 - value;
			$(".teams-shares-number").html(value+'%');
			$(".company-share-number").html(companyShare+'%');
			if(value>100){
				$('.text-danger').show();
				$('.save_sharing').attr('disabled','disabled');
			}
			else{
				$('.text-danger').hide();
				$('.save_sharing').removeAttr('disabled');
			}
	});
	
	$('#datepicker_select').datetimepicker();
	$( "#ex-customer" ).autocomplete({
		source: 'search',
		select: function(event, ui) {
				var data = $('#ex-customer').val(ui.item.value);
				$.ajax({
					url: 'search',
					type:'get',
					data: 'first_name='+ui.item.label,
					success:function(res){
						if(res){
							var jsonstring = $.parseJSON(res);
							$(".first_name").attr('value',jsonstring.first_name);
							$(".last_name").attr('value',jsonstring.last_name);
							$(".email").attr('value',jsonstring.email);
							//$(".street_address").attr('value',jsonstring.street_address);
							//$(".city").attr('value',jsonstring.city);
						//	$(".state").attr('value',jsonstring.state);
							//$(".zip").attr('value',jsonstring.zip);
							//$("#hidden_value").html('<input type="text" name="customer_id" value="'+jsonstring.customer_id+'">');
						}
					}
				});
				return false;
		}
	});
});
</script>