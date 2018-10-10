 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Account List Report</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        
                        </div>
                        <div class="body">
                 <form action="<?php echo base_url(); ?>index.php/Admin/ReportAccount" method="post">
                 <div class="row">
                     <div class="col-md-8">
                        <label class="text-red" for="ES">Search by Account Type:</label>
                               <select   id="ES" class="danger" name="account_type" required>
                                          <option disabled  selected>Select Account Type</option>
                                           <?php  foreach($this->$data['get_Account']->result_array()  as $row)  {   ?>           
                                           <option value="<?php echo $row['Type_ID']  ?>"><?php echo $row['Account_Type']  ?></option>
                                           <?php   } ?>          
                                </select>
                                        <br> <br>
                        <label  class="text-red" for="ES">Search by Date Registered:</label>
                                <label   style="padding-left: 30px;" class="text-red" for="ES">From:</label>
                                        <input   type="date" id="today" value='' name="from">  
                                <label class="text-red" for="ES">To:</label>    
                                       <input type="date" id="today1" value='' name="to">  
                                    <br>
                       </div>
                       <div class="col-md-4">
             <button class="btn btn-lg btn-success" name="search_button" type="submit"><i class="material-icons">search</i> Search </button>
             <button  onclick="printDiv('printableArea')" value="print a div!" class="btn btn-lg btn-danger" name="print" type="submit"><i class="material-icons">print</i> Print</button>
                       </div>
                    </div>
                                 
                        <div class="body table-responsive" style="overflow-y: auto; height: 400px;">
                             
                    <div id="printableArea">    
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                     <th class="text-center">#</th>
                                     <th class="text-center">Name</th>
                                     <th class="text-center">Email</th>
                                     <th class="text-center">Account Type</th>
                                     <th class="text-center">Date Registered</th>
                                    
                   
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->$data['account_list']->result_array()  as $row)  {  
                            ?>
                                 <tr>
                                   <td class="text-center"><?php echo $count ?></td>
                                   <td class="text-center"><?php echo $row['LastName'] ?>,&nbsp;<?php echo $row['FirstName'] ?>&nbsp;&nbsp;<?php echo $row['MiddleName'] ?></td>
                                   <td class="text-center"><?php echo $row['Email']  ?></td>
                                   <td class="text-center"><?php echo $row['Account_Type']  ?></td>
                                   <td class="text-center"><?php echo $row['DateRegistered']  ?></td>               
                                </tr>
                            <?php $count = $count + 1;  } ?>
                                
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                </form>
                   </div>
            </div>
    </div>

          
        </div>
    </section>