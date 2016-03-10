<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit State
                        </h1>
                        	<ol class="breadcrumb">
                            <li>
                               <i class="fa fa-fw fa-dashboard"></i><?php echo $this->Html->link('Dashboard', '/admin/dashboard'); ?>
                            </li>
							<li>
                                <i class="fa fa-fw fa-file"></i>  <?php echo $this->Html->link('States',['controller'=>'states', 'action'=>'index']); ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-11">
							
							<?php echo $this->Form->create($state,array('type'=>'file')); ?>

								<div class="form-group">
										<label class="control-label">State Name</label>
										<?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'required'=>false)); ?>			
								</div>
								
								
								<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<label class="control-label">State Icon</label>
											<div class="input textarea">
											<?php echo $this->Form->file('stateicon', array('label'=>false, 'div'=>false, 'required'=>false)); ?>
											<?php echo $this->Form->hidden('oldIcon', array('value'=>$state['icon']));?>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<?php echo $this->Html->image('stateicon/'.$state['icon']); ?>
										</div>
									</div>
								</div>
									
								<button type="submit" class="btn btn-default">Submit Button</button>
						<?php echo $this->Form->end(); ?>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>