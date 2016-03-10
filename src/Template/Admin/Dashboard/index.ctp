<?php echo $this->Element('admin/adminHeader');?>
<?php echo $this->Element('admin/adminSidebar');?>
	<div class="admin-wrapper">
		<div class="container">
		<div class="block col-6">
			<div class="col-header">
				<h1><a href="profiles"><?php echo $this->Html->image('adminDestop/profile-lg.png');  ?> My Profile</a></h1>
				<div class="edit-feild">
					<a class="edit" href="profiles">Edit</a>
				</div><!-- edit-feild -->
			</div><!-- header ends -->
			<div class="block-content">
				<p><span>Account Holder Name: </span><?php echo ucfirst($userInfo->first_name).' '.ucfirst($userInfo->last_name); ?></p>
				<p><span>Account Nickname: </span><?php echo ucfirst($userInfo->first_name).' '.ucfirst($userInfo->last_name); ?></p>
				<p><span>Account Email: </span><?php echo $userInfo->email; ?></p>
				<!--<p><span>Billing Address: </span><?php //echo ucfirst($userInfo->Address->street_address).' '.ucfirst($userInfo->Address->city).' '.$userInfo->address->zip; ?></p>-->

			</div><!-- content ends -->
		</div><!-- block ends -->

		<div class="block col-6 move-right">
			<div class="col-header">
				<h1><?php echo $this->Html->image('adminDestop/settings-lg.png');  ?> <a href="jobs">My Service Requests</a></h1>
				<div class="edit-feild">
					<a class="booking" href="jobs/addbooking">NEW BOOKING</a>
				</div><!-- edit-feild -->
			</div><!-- header ends -->
			<?php foreach($bookingList as $job) {  ?>			
			<div class="block-content">
				<p><span>Date: </span><?php echo h(date('Y-M-d',strtotime($job['ScheduledServices__created_at']))); ?></p>
				<p><span>Service Location:  </span><?php echo ucwords($job['CustomerPropertys__street_address']); ?></p>
				<p><span>Frequency: </span>One Time Service</p>
				<p><span>Assigned to: </span>N/A</p>
			</div><!-- content ends -->
			<?php } ?>
		</div><!-- block ends -->

<!-- ============================ full block ======================== -->

		<div class="block">
			<div class="col-header">
				<h1><?php echo $this->Html->image('adminDestop/home-lg.png');  ?> <a href="properties">My Properties</a></h1>
				<div class="edit-feild">
					<a class="booking" href="properties/addproperty">Add Property</a>
				</div><!-- edit-feild -->
			</div><!-- header ends -->
			<div class="block-content">
				<?php foreach ($userInfo['addresses'] as $addresses)  { //debug ($addresses);?>
				<div class="col-3">
					<a class="block-edit" href="properties/editproperty/<?php echo $addresses->id; ?>">edit</a>
					<div class="home-img">
						<?php echo $this->Html->image('adminDestop/home-img.png');  ?>
					</div><!-- home img -->
					<div class="property-info">
					<p>Address:</p>
					<p><span><?php echo $addresses['street_address'].' '.$addresses['city'].' '.$addresses['zip']; ?></span></p>
					</div> <!-- info ends -->

					<div class="property-size">
						<p>Property size:</p>
						<span><?php echo ucfirst($addresses['yard']['yards']); ?></span>
					</div>
				</div><!-- col 3 ends -->
				<?php } ?>
				<div class="col-3">
				</div><!-- col 3 ends -->

			</div><!-- content ends -->
		</div><!-- block ends -->




		<div class="block">
			<div class="col-header">
				<h1><?php echo $this->Html->image('adminDestop/mail-lg.png');  ?>Message Center</h1>
				<span class="messages">2</span>
				<!--<div class="edit-feild">
					<a class="booking" href="#">Add Property</a>
				</div>--><!-- edit-feild -->
			</div><!-- header ends -->
			<div class="block-content">

				<div class="col-3 messages">
					<div class="property-info">
					<p>Service Request Received</p>
					<p><span>Whats Next? Sit tight, we are scheduling your service request. You will receive a text/email when your lawn pro has been assigned.</span></p>
					</div> <!-- info ends -->					 
				</div><!-- col 3 ends -->

				<div class="col-3 messages">
					<div class="property-info">
					<p>Service Complited</p>
					<p><span>Receipt emailed</span></p>
					<a class="review" href="#">submit review</a>
					</div> <!-- info ends -->					 
				</div><!-- col 3 ends -->

				 

				<div class="col-3 messages">
				</div><!-- col 3 ends -->

			</div><!-- content ends -->
		</div><!-- block ends -->




		<div class="block">
			<div class="col-header">
				<h1><?php echo $this->Html->image('adminDestop/payments-lg.png');  ?>My Payments</h1>				 
				<div class="edit-feild">
					<a class="edit" href="#">Edit</a>
				</div><!-- edit-feild -->
			</div><!-- header ends -->
			<div class="block-content">

				<div class="col-table">
					<div class="block-content">						
					<p><span>Name : </span><?php echo ucfirst($userInfo->first_name).' '.ucfirst($userInfo->last_name); ?></p>
					<p><span>Debit/Credit card Number:</span> <?php echo $credit_cardsInfo->credit_card_no; ?></p>
					</div> <!-- iblock-content -->					 
				</div><!-- col 3 ends -->

				<div class="col-table">
					<div class="block-content">
					<p><span>Expire Month: </span> <?php echo $credit_cardsInfo->expire_month_id; ?></p>
					<p><span>Security Code: </span> <?php echo $credit_cardsInfo->cvv; ?></p>					 
					</div> <!-- iblock-content -->					 
				</div><!-- col 3 ends -->

				<div class="col-table">
					<div class="block-content">
					<p><span>Expire Year:  </span> <?php echo $credit_cardsInfo->expire_year; ?></p>
					<p><span>Zip Code: </span> <?php echo $userInfo->zip; ?></p>					 
					</div> <!-- iblock-content -->					 
				</div><!-- col 3 ends -->

				 

				<div class="col-table">
				</div><!-- col 3 ends -->

			</div><!-- content ends -->
		</div><!-- block ends -->



	</div>
	</div><!-- wrapper -->

	
</body>
</html>