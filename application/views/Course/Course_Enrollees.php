    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Enrollees</h3>
                        </div>
                        <div class="body">
                        <?php if($this->data['Enrollees_List']->num_rows() != 0): ?>
                        <?php foreach($this->data['Enrollees_List']->result_array() as $row): ?>
                        <?php $coursename = $row['CourseName']; ?>
                        <?php endForeach; ?>
                            <div class="card" style="width:100%">
                                <div class="header">
                                   <h3><?php echo $coursename; ?></h3>
                                </div>
                                <div class="body">
                                <table class="table table-hover dashboard-task-info" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <!--<th>Description</th>-->
                                        <th>Date Enrolled</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($this->data['Enrollees_List']->num_rows() != 0): ?>
                                    <?php foreach($this->data['Enrollees_List']->result_array() as $row): ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['FirstName']; ?>
                                            <?php echo $row['MiddleName'][0]; ?>
                                            <?php echo $row['LastName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['DateJoined']; ?>
                                        </td>
                                        <td><button class="btn btn-danger" name="leavecourse" >Remove From Course</button></td>
                                        <td><button class="btn btn-info" name="viewpage">View Profile</button></td>
                                    </tr>
                                    <?php endForeach; ?>
                                    <?php endIf; ?>
                                    </div>
                                </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                        <h4>There's None Enrolled Yet.</h2>
                        <?php endIf; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

