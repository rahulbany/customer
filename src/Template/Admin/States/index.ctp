<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">
				
				 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            States 
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
                            <li class="active">
                                <i class="fa fa-edit"></i> States
                            </li>
							<li class="add-data">
								<?php echo $this->Html->image("settings/add_record.gif", ['alt' => 'addrecord', 'title'=>'Add record', 'url' => ['controller' => 'States', 'action' => 'add']]); ?>
							</li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-12">
						
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>States Name</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$flag = 1;
										foreach($AllState as $row){
											?><tr class="<?php if($flag%2==0){ echo 'active';}else{ echo 'success';} ?>">
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $this->Html->image('stateicon/'.$row['icon'], ['width'=>'40']); ?></td>
												<td><?php echo date('jS  F Y h:i A',strtotime($row['created'])); ?></td>
												<td>
													<?php 
													
													echo $this->Html->link($this->Html->image('settings/edit.png', ['alt'=>'edit', 'title'=>'Edit','width' => '17']), ['action' => 'edit', $row['id']] ,['escape' => false]).'&nbsp;&nbsp;&nbsp;';
													
													echo $this->Form->postLink($this->Html->image('settings/delete.png', ['alt'=>'delete', 'title'=>'Delete','width' => '17']), ['action' => 'delete', $row['id']], ['escape' => false,'confirm' => 'Are you sure?'] );
													
													?>	
												</td>
											</tr><?php 
										$flag++;	
										}

									if($flag==1){
										echo '<tr><td align="center" colspan="2" style="color:red;">No states found...</td></tr>';
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