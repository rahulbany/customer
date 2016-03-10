<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Page
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                               <i class="fa fa-fw fa-dashboard"></i><?php echo $this->Html->link('Dashboard', '/admin/dashboard'); ?>
                            </li>
							<li>
                                <i class="fa fa-fw fa-file"></i>  <?php echo $this->Html->link('Pages',['controller'=>'pages', 'action'=>'index']); ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-11">
							
							<?php echo $this->Form->create($page); ?>

								<div class="form-group">
										<label class="control-label">Title</label>
										<?php echo $this->Form->input('title', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'required'=>false)); ?>			
								</div>
								
								<div class="form-group">
										<label class="control-label">Slug</label>
										<?php echo $this->Form->input('slug', array('label'=>false, 'div'=>false, 'class'=>'form-control', 'required'=>false)); ?>			
								</div>

								<div class="form-group">
									<label class="control-label">Content</label>
									<div class="input textarea"><?php echo $this->Form->input('content', array('type'=>'textarea',  'required'=>false, 'label'=>false, 'div'=>false, 'id'=>'content', 'class'=>'form-control pagecontent', 'style'=>array('height:300px;width:928px;'))); ?></div>
								</div>
								
								<div class="form-group">
										<label class="control-label">SEO Title</label>
										<div class="input text">
										<?php echo $this->Form->input('seo_title', array('label'=>false,  'required'=>false, 'div'=>false, 'class'=>'form-control')); ?>			
										</div>						
								</div>

								<div class="form-group">
									<label class="control-label">SEO Content</label>
									<div class="input textarea"><?php echo $this->Form->input('seo_content', array('type'=>'textarea',  'required'=>false,  'label'=>false, 'div'=>false, 'id'=>'seocontent', 'class'=>'form-control pagecontent', 'style'=>array('height:100px;width:928px;'))); ?></div>
								</div>
								
								<div class="checkbox">
                                    <label>
                                        	<?php echo $this->Form->input('headlayout', array('label'=>false, 'type'=>'checkbox', 'div'=>false, 'required'=>false)); ?><strong>Custom header for become a partner on the top</strong>
                                    </label>
                                </div>
									
								<button type="submit" class="btn btn-default">Submit Button</button>
						<?php echo $this->Form->end(); ?>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() { 
		new nicEditor({fullPanel : true}).panelInstance('content');
		new nicEditor({fullPanel : true}).panelInstance('seocontent');
		});
	</script>
</body>
</html>