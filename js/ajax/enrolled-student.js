
   $(function(){
	showAllEnrolledStudent();

//function
function showAllEnrolledStudent(){
	$.ajax({
		type: 'ajax',
		url: 'ajax_enrolled_student',
		async: false,
		dataType: 'json',
		success: function(data){
			var html = '';
			var i;
			var x = 0;
			for(i=0; i<data.length; i++){
			   x++;
				html
				 +='<tr>'+
							'<td>'+x+'</td>'+
							'<td>'+data[i].First_Name+'</td>'+
							'<td>'+data[i].Student_Number+'</td>'+
							'<td>'+data[i].Course+'</td>'+
							'<td>'+
								'<a href="javascript:;"   data-toggle="modal" data-target="#largeModal"  class="btn btn-info item-edit" data="'+data[i].Student_Number+'">View Student Information</a>'+
							'</td>'+
						'</tr>';
			}
			$('#showdataa').html(html);
		},
		error: function(){
			alert('Could not get Data from Database');
		}
	});
}
});
 


