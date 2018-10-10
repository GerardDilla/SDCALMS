 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->session->userdata('FirstName'); ?>
                        <?php echo $this->session->userdata('MiddleName')[0]; ?>
                        <?php echo $this->session->userdata('LastName'); ?>
                    </div>
                    <div class="email"><?php echo $this->session->userdata('Email'); ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                <?php $AC = $this->session->userdata('AccountType'); ?>
                <?php if($AC == 1): ?>
                    <li class="active" style="display:none">
                        <a href="<?php echo base_url(); ?>index.php/User/Dashboard">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Account Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/AccountList">Account List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/Registration">Add Account</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/AdminRegistration">Admin Registration</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>OBE Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/SO">
                                    <span>Student Outcomes</span>
                                </a>
                            </li>                                       
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/SOForm">
                                    <span>Add Student Outcomes</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/CILO">
                                    <span>Course Intended Learning Outcomes</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/CILOForm">
                                <span>Add Intended Learning Outcomes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment_return</i>
                            <span>Course Management</span>
                        </a>
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
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">import_contacts</i>
                            <span>Assessment Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Assessment/AssessmentList">
                                    <span>Assessment List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Assessment">
                                    <span>Create Assessment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">inbox</i>
                            <span>Rubrics</span>
                        </a>
                        <ul class="ml-menu">

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Curriculum</span>
                        </a>
                        <ul class="ml-menu">

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_chart</i>
                            <span>Report</span>
                        </a>
                    </li>
                    
                <?php elseif($AC == 2): ?>
                    <li class="active" style="display:none">
                        <a href="<?php echo base_url(); ?>index.php/User/Dashboard">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Account Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Course Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Course/CourseList">Courses</a>
                            </li>
                        </ul>
                    </li>

                    <li style="display:none">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Assessment Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                               <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Reports</span>
                                </a>
                                     <ul class="ml-menu">
                                         <li>
                                             <a href="<?php echo base_url(); ?>index.php/Admin/reportenrollstudents">
                                                <span >Enrolled Student</span>
                                              </a>
                                         </li>
                                          <li>
                                               <a href="javascript:void(0);">
                                                 <span>Level - 3</span>
                                               </a>
                                          </li>
                                     </ul>
                             </li>
                        </ul>
                    </li>
                <?php elseif($AC == 3): ?>
                    <li class="active" style="display:none">
                        <a href="<?php echo base_url(); ?>index.php/User/Dashboard">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Account Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
                            </li>
                        </ul>
                    </li>
                <?php elseif($AC == 4): ?>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Account Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Account/Profile">Personal Info</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>OBE Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/SO">
                                    <span>Student Outcomes</span>
                                </a>
                            </li>                                       
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/SOForm">
                                    <span>Add Student Outcomes</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/CILO">
                                    <span>Course Intended Learning Outcomes</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Education/CILOForm">
                                <span>Add Intended Learning Outcomes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Course Management</span>
                        </a>
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
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Assessment Management</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Assessment">
                                    <span>Assessment List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Assessment">
                                    <span>Create Assessment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endIf; ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                  <a href="javascript:void(0);"></a>.
                </div>
                <div class="version">
                    
                </div>
            </div>
            <!-- #Footer -->
        </aside>