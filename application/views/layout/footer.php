 </section>

   <script src="<?php echo base_url(); ?>js/js/bootstrap.js"></script>  
   <script src="<?php echo base_url(); ?>js/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>js/js/jquery-3.1.1.min.js"></script>
  
        <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script> 
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-countto/jquery.countTo.js"></script>	
    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/morrisjs/morris.js"></script>
    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>plugins/chartjs/Chart.bundle.js"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/pages/ui/dialogs.js"></script>
    <script src="<?php echo base_url(); ?>js/admin.js"></script>
    <script src="<?php echo base_url(); ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    
    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>


    <!-- custom -->
    <script src="<?php echo base_url(); ?>js/custom/login.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/forms/advanced-form-elements.js"></script>
    <script src="<?php echo base_url(); ?>js/js/custom/assessment.js"></script>


    <script>
        var frm = $('#feedback_form');
        function ViewComment(id){
            //alert(id);
            var base = '<?php echo base_url(); ?>';
            $("#CommentRefresh").val(id);
            $("#CommentPostID").val(id);
            //console.log(id);
            //$(document).scrollTop($(document).height());
            
            $.ajax({
                type: 'GET',
                url: base+'index.php/Course/Comments',
                data: {PostID: id},
                dataType:"json",
                
                success: function (data) {
                    var output = '';
                    if(data.length != 0){
                        for (i = 0; i < data.length; i++) {
                            //alert(data[i].Comment);
                            
                            output += '<div class="card">';
                            output += '<div class="header">';
                            output += '<h2>'+data[i].FirstName+' '+data[i].LastName+'<small>'+data[i].CommentDate+'</small></h2>';
                            output += '</div>';
                            output += '<div class="body">';
                            output += data[i].Comment;
                            output += '</div>';
                            output += '</div>';
                            
                            
                        }
                    }else{

                            output += '<div class="card">';
                            output += '<div class="body">';
                            output += '<h3>No Comments Here</h3>';
                            output += '</div>';
                            output += '</div>';

                    }
                    $("#CommentBody").html(output);
                    $('#CommentBody').animate({ scrollTop: 10000 }, 'slow');

                    
                    

                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                    //$("#feedback_msg").html(data);
                },
                
            });
            
        }
    </script>

    <script type="text/javascript">
        var frm = $('#CommentForm');

        frm.submit(function (e) {

            e.preventDefault();
            
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    
                    if(data == 1){
                        
                        var id = $('#CommentPostID').val();
                        //alert(id);
                        ViewComment(id);
                    }
                    else{
                    console.log('Returned form errors.');
                    console.log(data);
                    $("#feedback_error").html(data);
                    }

                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                    //$("#feedback_msg").html(data);
                },
            });
        });
    </script>


        
 <script>
   
   $("#add_criterion").click(function() {
      

   $("#criterion").append( 
       '<tr><td class="text-center"><textarea type="text" name="criterias[]" rows="5" placeholder="Criteria"></textarea><br><a class="btn btn-primary" onclick="$(this).parent().parent().remove()">Remove Criterion</a></td><td><textarea name="crit_Des[]"  rows="10" cols="14" placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14"placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14" placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14"placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10"cols="14" placeholder="Description"></textarea></tr>'
       );
     
     });

   </script>


    <script>
  
  $("#add_criterion1").click(function() {
     
 
  $("#criterion1").append( 
      '<tr><td class="text-center"><textarea type="text" name="criterias[]" rows="5" placeholder="Criteria"></textarea><br><a class="btn btn-primary" onclick="$(this).parent().parent().remove()">Remove Criterion</a></td><td><textarea name="crit_Des[]"  rows="10" cols="14" placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14"placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14" placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10" cols="14"placeholder="Description"></textarea></td><td><textarea name="crit_Des[]"  rows="10"cols="14" placeholder="Description"></textarea></tr>'
      );
   
    });

  </script>


<script>

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>



</body>

</html>