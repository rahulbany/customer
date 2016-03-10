<?php echo $this->Element('admin/header');?>
<?php echo $this->Element('admin/sidebar');?>
<?php echo $this->Html->script('admin/js/nicEdit-latest.js'); ?>
   <div id="page-wrapper">
            <div class="container-fluid">
				
				 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cities 
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
                                <i class="fa fa-fw fa-file"></i>  <?php echo $this->Html->link('Cities',['controller'=>'cities', 'action'=>'index']); ?>
                            </li>
							<li class="add-data">
								<?php echo $this->Html->image("settings/add_record.gif", ['alt' => 'addrecord', 'title'=>'Add record', 'url' => ['controller' => 'cities', 'action' => 'add']]); ?>
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
                                        <th>City</th>
                                        <th>Slug</th>
                                        <th>State</th>
                                        <th>Seo Title </th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$flag = 1;
										foreach($AllCities as $row){
											?><tr class="<?php if($flag%2==0){ echo 'active';}else{ echo 'success';} ?>">
											<td><?php echo $this->Html->link($row['city'], '/cities/'.$row['slug'].'', array('target' => '_blank')); ?></td>
												
												<td><?php echo $row['slug']; ?></td>
												<td><?php echo $row['state']['name']; ?></td>
												<td><?php echo $row['seo_title']; ?></td>
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
										echo '<tr><td align="center" colspan="2" style="color:red;">No city found...</td></tr>';
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