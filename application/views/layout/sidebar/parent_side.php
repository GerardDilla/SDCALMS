<section>
	<!-- Left Sidebar -->
	<aside class="sidebar" id="leftsidebar">
		<!-- User Info -->
		<div class="user-info">
			<div class="image"><img alt="User" height="48" src="<?php echo base_url(); ?>images/user.png" width="48"></div>
			<div class="info-container">
				<div aria-expanded="false" aria-haspopup="true" class="name" data-toggle="dropdown">
					<?php echo $this->session->userdata('FirstName'); ?><?php echo $this->session->userdata('MiddleName')[0]; ?><?php echo $this->session->userdata('LastName'); ?>
				</div>
				<div class="email">
					<?php echo $this->session->userdata('Email'); ?>
				</div>
			</div>
		</div><!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="active" style="">
					<a href="<?php echo base_url(); ?>index.php"><i class="material-icons">dashboard</i> <span>No Content Yet.</span></a>
				</li>
			</ul>
		</div><!-- #Menu -->
		<!-- Footer -->
		<div class="legal">
			<div class="copyright">
				<a href="javascript:void(0);"></a>.
			</div>
			<div class="version"></div>
		</div><!-- #Footer -->
	</aside>
</section>