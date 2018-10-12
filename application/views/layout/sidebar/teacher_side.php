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
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">accessibility</i> <span>Account Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">book</i> <span>OBE Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Education/SO"><span>Student Outcomes</span></a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/Education/SOForm"><span>Add Student Outcomes</span></a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/Education/CILO"><span>Course Intended Learning Outcomes</span></a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/Education/CILOForm"><span>Add Intended Learning Outcomes</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">assignment_return</i> <span>Course Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Course/CourseList">Courses</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/Course/AddCourse">Add Course</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="menu-toggle" href="javascript:void(0);"><i class="material-icons">import_contacts</i> <span>Assessment Management</span></a>
					<ul class="ml-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/Assessment"><span>Assessment List</span></a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/Assessment"><span>Create Assessment</span></a>
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