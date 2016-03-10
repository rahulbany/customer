<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">
				
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pages 
                        </h1>
						<?php 
							############ Show Flash Message ##############
							$session = $this->request->session();
							if ($session->read('Flash.flash')): echo $this->Flash->render(); endif;
							############ End Flash Message ##############
						?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-fw fa-dashboard"></i><?php echo $this->Html->link('Dashboard', '/admin/dashboard'); ?>
                            </li>
							  <li>
                                <i class="fa fa-fw fa-file"></i>Pages
                            </li>
							<li class="add-data">
								<?php echo $this->Html->image("settings/add_record.gif", ['alt' => 'addrecord', 'title'=>'Add record', 'url' => ['controller' => 'Pages', 'action' => 'add']]); ?>
							</li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-12">
						
							<table id="example" class="table table-bordered table-hover table-striped display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo  $this->Paginator->sort('title', 'Page Title') ?></th>
                                        <th><?php echo  $this->Paginator->sort('slug', 'Page Slug') ?></th>
                                        <th><?php echo  $this->Paginator->sort('seo_title', 'Seo Title') ?></th>
                                        <th><?php echo  $this->Paginator->sort('created', 'Created Date') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									if(!empty($allPage)){
										$flag = 1;
										foreach($allPage as $row){
											?><tr class="<?php if($flag%2==0){ echo 'active';}else{ echo 'success';} ?>">
												<td><?php echo $this->Html->link($row['title'], '/'.$row['slug'].'', array('target' => '_blank')); ?></td>
												<td><?php echo $row['slug']; ?></td>
												<td><?php echo $row['seo_title']; ?></td>
												<td><?php echo date('jS  F Y h:i A',strtotime($row['created'])); ?></td>
												<td>
													<?php echo $this->Html->link($this->Html->image('settings/edit.png', ['alt'=>'edit', 'title'=>'Edit','width' => '17']), ['action' => 'edit', $row['id']] ,['escape' => false]);?>
													<?php //echo  $this->Form->postLink('DELETE', ['action' => 'delete', $row['id']],    ['confirm' => 'Are you sure?']); ?>
												</td>
											</tr><?php
										$flag++;	
										} 
									}
								?>
                                </tbody>
                            </table>
							
							<!--=================================== Pagination Start here ========================================-->
							<?php
							echo '<div class="templatePagination">';
							echo '<ul class="paginationFirst">'.$this->Paginator->first('<<').'</ul>';
							if($this->Paginator->hasPrev()){ echo '<ul class="paginationPrev">'.$this->Paginator->prev(__('<'), array('tag' => false)).'</ul>'; }
							echo $this->Paginator->numbers(
								array('before' => '<ul class="pagination">','separator' => '', 'currentClass' => 'active','currentTag' => 'a','tag' => 'li','after' => '</ul>')
							);
							if($this->Paginator->hasNext()){ echo '<ul class="paginationNext">'.$this->Paginator->next(__('>'), array('tag' => false)).'</ul>'; }
							echo '<ul class="paginationLast">'.$this->Paginator->last('>>').'</ul>'; 
							echo '<div class="showingLabel">'.$this->Paginator->counter('Showing {{current}} records out of {{count}} total').'</div>';
							echo '</div>';
							?>
							<!--=================================== Pagination End here ========================================-->
							 
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>