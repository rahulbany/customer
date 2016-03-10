<?php echo $this->Element('admin/adminHeader');?>
<?php echo $this->Element('admin/adminSidebar');?>
<div id="main" role="main">
	<div id="ribbon">
		<ol class="breadcrumb">
			<li><?php //echo $this->Html->link('Dashboard', '/admin/dashboard'); ?></li>		 
			<li>CreditCards Management</li>
		</ol>
	</div>	
	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><i class="fa fa-table fa-fw "></i><span>CreditCards Management</span></h1>
			</div>
		</div>
		<?php 
			############ Show Flash Message ##############
			$session = $this->request->session();
			if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
			############ End Flash Message ##############
		?>
		<section id="widget-grid" class="">
			<div class="row">
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
						<header>
							<span class="widget-icon"><i class="fa fa-table"></i></span><h2>CreditCards</h2>							
						</header>
						<!-- table start   -->
						<?php if(!empty($data)) { ?>	
						<div>
							<div class="jarviswidget-editbox"></div>
							<div class="widget-body no-padding">
								<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
									<thead>			                
										<tr>
											<th data-hide="phone,tablet">Type</th>
											<th data-hide="phone,tablet">Last digits</th>												
											<th data-hide="phone,tablet">Expired</th>												
											<th data-hide="phone,tablet">Email</th>									
											<th data-hide="phone,tablet">Default</th>									
										</tr>
									</thead>
									<tbody>
										<?php foreach($data as $info) {  ?>										
										<tr> 
											<td><?php echo $info->neme_of_the_card;?></td>
											<td><?php echo $info->credit_card_no;?></td>
											<td><?php echo $info->expire_year;?></td>
											<td><?php echo $info->user->email;?></td>
											<?php if ($info->is_enabled == 1) { ?>
											<td class="actions">
													<?php echo $this->Html->link($this->Html->image('icon/activate.png', ['alt'=>'edit', 'title'=>'Make Default','width' => '17']), ['action' => 'card_status',$info->user->id,$info->id] ,['escape' => false]);?>
											</td>
											<?php } else {  ?>
											<td class="actions">
													<?php echo $this->Html->link($this->Html->image('icon/deactivate.png', ['alt'=>'edit', 'title'=>'Remove Default','width' => '17']), ['action' => 'card_status',$info->user->id,$info->id] ,['escape' => false]);?>
											</td>	
											<?php } ?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php }  else { ?>
                        <div id="dt-toolbar" style="text-align:center;">No records found.</div>
						<?php  }       ?>	
						<!-- end table-->	
					</div>
				</article>
			</div>
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