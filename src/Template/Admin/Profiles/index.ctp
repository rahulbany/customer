<?php echo $this->Element('admin/adminHeader');?>
<?php echo $this->Element('admin/adminSidebar');?>
<?php echo $this->Html->css('admin/profile_popup.css'); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://www.academatch.net/js/bootstrap-fileupload.min.js"></script>

<div id="main" role="main">

	<div id="ribbon">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
			<i class="fa fa-refresh"></i>
			</span> 
		</span>
		<ol class="breadcrumb"><li>Dashboard</li>Profile</li></ol>
	</div>
	

	
	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-table fa-fw "></i> 
						Dashboard 
					<span>> 
						Profile
					</span>
				</h1>
			</div>
		</div>
		<?php 
							############ Show Flash Message ##############
							$session = $this->request->session();
							if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
							############ End Flash Message ##############
				?>
		
		<div class="row">
			<div class="col-sm-12">
			<!-- main div start -->
				<div class="well well-sm">		
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<div class="well well-light well-sm no-margin no-padding">
								<div class="row">
									<div class="col-sm-12">
										<div class="carousel fade profile-carousel" id="myCarousel">
											<div class="air air-top-left padding-10">
												<h4 class="txt-color-white font-md">Jan 1, 2014</h4>
											</div>
											<ol class="carousel-indicators">
												<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
												<li class="" data-slide-to="1" data-target="#myCarousel"></li>
												<li class="" data-slide-to="2" data-target="#myCarousel"></li>
											</ol>
											<div class="carousel-inner">
												<div class="item active"><?php echo $this->Html->image('demo/s1.jpg', ['alt'=>'demouserdpscrrenshot']); ?></div>
												<div class="item"><?php echo $this->Html->image('demo/s2.jpg', ['alt'=>'demouser']); ?></div>
												<div class="item"><?php echo $this->Html->image('demo/m3.jpg', ['alt'=>'demouserdpscrrenshot']); ?></div>
											</div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="row">
									<div class="col-sm-5 profile-pic">
											<!-- image section start-->
									<div class="padding-10 img-block">
									<?php if(!empty($userInfo->profile_image)) {
											 echo $this->Html->image('profileImage/'.$userInfo->profile_image, ['alt'=>'demouserdpscrrenshot']); 
										 } else {
										  echo $this->Html->image('profileImage/default.png'); 
										}	?>
									<!-- echo $this->Html->image('avatars/sunny-big.png', ['alt'=>'demouserdpscrrenshot']); -->
									
									<p> <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"></a></p>

												<!--	 echo $this->Html->image('avatars/sunny-big.png', ['alt'=>'demouserdpscrrenshot']);  -->
													<!--ul class="list-unstyled">
													<li>
														<p class="text-muted">
															<i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken">313</span>) <span class="txt-color-darken">464</span> - <span class="txt-color-darken">6473</span>
														</p>
													</li>
													<li>
														<p class="text-muted">
															<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:simmons@smartadmin">ceo@smartadmin.com</a>
														</p>
													</li>
													<li>
														<p class="text-muted">
															<i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken">john12</span>
														</p>
													</li>
													<li>
														<p class="text-muted">
															<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken">Free after <a data-original-title="Create an Appointment" data-placement="top" title="" rel="tooltip" href="javascript:void(0);">4:30 PM</a></span>
														</p>
													</li>
												</ul-->
												</div>
												<!-- image section close-->
											</div>
											
											<div class="col-sm-7">
												<h1><span class="semi-bold"><?php echo ucfirst($this->request->session()->read('Auth.User.login_name')); ?></span></h1>
												<p>
													Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
													cumque nihil impedit quo minus id quod maxime placeat facere
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12 col-lg-6">

							<div data-widget-editbutton="false" data-widget-colorbutton="false" id="wid-id-0" class="jarviswidget jarviswidget-sortable" role="widget">
								<header role="heading"><div class="jarviswidget-ctrls" role="menu"> </div>
									<span class="widget-icon"> <i class="fa fa-check txt-color-green"></i></span>
									<h2>Update Information</h2>			
									
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
								
								<?php if(!empty($userInfo)) {
				
								?>
							
								<div role="content">
									<div class="jarviswidget-editbox"></div>
									<div class="widget-body no-padding">
											<?php echo $this->Form->create($userInfo, ['class'=>'smart-form','id'=>'editProperty']);  ?>	
											<fieldset>		

												<section>
													<label class="label">First name</label>
													<label class="input">
													<?php echo $this->Form->input('first_name',['label'=>false]); ?>
													</label>
													<div class="note">This is a required field.</div>
												</section>	
												
												<section>
													<label class="label">Last name</label>
													<label class="input">
													<?php echo $this->Form->input('last_name',['label'=>false]); ?>
													</label>
													<div class="note">This is a required field.</div>
												</section>

												
												<section>
													<label class="label">Email</label>
													<label class="input">
													<?php echo $this->Form->input('email',['label'=>false]); ?>
													</label>
													<div class="note">This is a required field.</div>
												</section>
												

											</fieldset>	
											<footer>
											<button type="submit" class="btn btn-primary" onclick="submitFormData()">
															<i class="fa fa-save"></i>
															Save
											</button>
											
											</footer>
											</form>
											<?php 	echo $this->Form->end(); ?>
									</div>
								</div>
								
						<?php } ?>
								
								
							</div>
						</div>
					</div>
					
				</div>
			<!-- main div close-->
			</div>
		</div>
	</div>
</div>

<!---  CHANGE IMAGE POP UP-->
<div id="light" class="white_content">
									<div data-provides="fileupload" class="fileupload fileupload-new">
											 <div style="width: 200px; height: 150px;" class="fileupload-preview thumbnail">
												<?php if(!empty($userInfo->profile_image)) {
												echo $this->Html->image('profileImage/'.$userInfo->profile_image, ['alt'=>'demouserdpscrrenshot']); 
												} else {
												echo $this->Html->image('profileImage/default.png'); 
												}	?>                      
											</div>
											
											 <?php  echo $this->Form->create(@$data,array('url'=>array('controller'=>'Profiles','action'=>'changeImage'),'type' => 'file'));  ?>
											<!--   echo $this->Form->create(null, ['url' => ['controller' => 'Profiles', 'action' => 'changeImage'], 'type'=>'file' ]); ?> -->
											<?php $edit_id = $userInfo->id;?>
											<div>
												<span class="btn btn-file">
											
												 <input type="file" id="PostJobLogo" name="profile_image"></span>
												  <div class="update">
													<?php echo $this->Form->input('id', ['type' => 'hidden', 'value'=>$edit_id]);?>
													<input type="submit" name="submit" class="submitBtn" value="update" />
												</div>
											</div>
									</div>
									
									
									<a class="exit-popup" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a>
				</div>
					<div id="fade" class="black_overlay"></div>





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
		<?php echo $this->Html->script('plugin/jquery-validate/jquery.validate.min.js'); ?>
		<?php echo $this->Html->script('plugin/masked-input/jquery.maskedinput.min.js'); ?>
		<?php echo $this->Html->script('plugin/select2/select2.min.js'); ?>
		<?php echo $this->Html->script('plugin/bootstrap-slider/bootstrap-slider.min.js'); ?>
		<?php echo $this->Html->script('plugin/msie-fix/jquery.mb.browser.min.js'); ?>
		<?php echo $this->Html->script('plugin/fastclick/fastclick.min.js'); ?>
		<?php echo $this->Html->script('demo.min.js'); ?>
		<?php echo $this->Html->script('app.min.js'); ?>
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
		<!-- Full Calendar -->
		<?php echo $this->Html->script('plugin/moment/moment.min.js'); ?>
		<?php echo $this->Html->script('plugin/fullcalendar/jquery.fullcalendar.min.js'); ?>
		
		
		<script type="text/javascript">
	function submitFormData(){
		$("#editProperty").validate({
		errorClass:"errors",
		rules: {					
				"first_name":{required: true},
				"last_name":{required: true},
				//"email":{required:true,email: true,remote:'bookings/checkemailalreadyexist'},								
				"email":{required:true,email: true},									
		},
		messages: {  			
			"first_name": {required: "This field is required"},
			"last_name": {required: "This field is required"},
			//"email" : { required: "This field is required", email: "Please enter a valid email address", remote: "Email  already exist please try another email" },
			"email" : { required: "This field is required", email: "Please enter a valid email address"},				
		},	
		});	
		
}
</script>
		
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
		$("#flash_notification").click(function(){
				//$(this).remove();
				$(this).slideUp();
			});
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	
	
			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};
	
				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});
	
			/* END BASIC */
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_col_reorder) {
						responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_col_reorder.respond();
				}			
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});
			
			/* END TABLETOOLS */
		
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
			})();
		</script>