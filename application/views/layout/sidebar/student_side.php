<!-- SIDEBAR FOR STUDENT -->
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
				<li class="active" style="display:none">
					<a href="<?php echo base_url(); ?>index.php/User/Dashboard"><i class="material-icons">dashboard</i> <span>Dashboard</span></a>
				</li>
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">accessibility</i> <span>Account Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">accessibility</i> <span>Course Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Course/CourseList">Courses</a>
						</li>
					</ul>
				</li>
				<li style="display:none">
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">person</i> <span>Assessment Management</span></a>
					<ul class="ml-menu">
						<li>
							<a class="menu-toggle" href="javascript:void(0);"><span>Reports</span></a>
							<ul class="ml-menu">
								<li>
									<a href="<?php echo base_url(); ?>index.php/Admin/reportenrollstudents"><span>Enrolled Student</span></a>
								</li>
								<li>
									<a href="javascript:void(0);"><span>Level - 3</span></a>
								</li>
							</ul>
						</li>
					</ul>
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