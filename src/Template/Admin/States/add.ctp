<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add State
                        </h1>
						
						<ol class="breadcrumb">
                            <li>
                               <i class="fa fa-fw fa-dashboard"></i><?php echo $this->Html->link('Dashboard', '/admin/dashboard'); ?>
                            </li>
							<li>
                                <i class="fa fa-fw fa-file"></i>  <?php echo $this->Html->link('States',['controller'=>'states', 'action'=>'index']); ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
							
							<?php echo $this->Form->create($page,array('type'=>'file')); ?>

								<div class="form-group">
										<label class="control-label">State Name</label>
										<?php echo $this->Form->input('name', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'required'=>false)); ?>			
								</div>
								
								<div class="form-group">
									<label class="control-label">State Icon</label>
									<div class="input text"><?php echo $this->Form->file('icon', array('label'=>false, 'div'=>false, 'required'=>false)); ?></div>
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