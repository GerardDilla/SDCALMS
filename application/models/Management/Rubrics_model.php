<?php
class Rubrics_model extends CI_Model{
 


// SELECT RUBRICS

public function rubrics(){
    $this->db->select('*');
    $this->db->where('active','1');
    $query = $this->db->get('lms_rubrics_table');
     
    if($query->num_rows()> 0){
        return $query->result();
                }else{
        return $query->result();
                    }                                          

}

// View RUBRICS

public function view_rubrics(){
    $rubrics_id = $this->input->get_post('rubrics_id');
    $this->db->select('*');
    $this->db->where('rubrics_id',$rubrics_id);
    $query = $this->db->get('lms_rubrics_table');

    if($query->num_rows()> 0){
        return $query->result();
                }else{
        return $query->result();
                    }   
}

public function view_rubrics_description(){
    $rubrics_id = $this->input->get_post('rubrics_id');
    $this->db->select('*');
    $this->db->where('rubrics_id',$rubrics_id);
    $query = $this->db->get('lms_rubrics_description');

  
        return $query;
}

public function view_rubrics_escale(){
    $rubrics_id = $this->input->get_post('rubrics_id');
    $this->db->select('*');
    $this->db->where('rubrics_id',$rubrics_id);
    $query = $this->db->get('lms_rubrics_escale');


        return $query;
  
}

public function getdescription(){
    $rubrics_id = $this->input->get_post('rubrics_id');
    $this->db->select('*');
	$this->db->from('lms_criteria_description');
	$this->db->join('lms_rubrics_criteria','lms_rubrics_criteria.criteria_id = lms_criteria_description.criteria_id');
    $this->db->where('lms_criteria_description.rubrics_id',$rubrics_id);
    $this->db->where('lms_criteria_description.active','1');
    $this->db->where('lms_rubrics_criteria.active','1');
	$query = $this->db->get();    
    return $query;
                    
}

//DELETE RUBRICS

public function deleterubrics(){
 $rubrics_id = $this->input->get_post('rubrics_id');

 $this->db->set('active','0');
 $this->db->where('rubrics_id',  $rubrics_id);
 $this->db->update('lms_rubrics_table');
 // reset query
 $this->db->reset_query();
}

// UPDATE RUBRICS

public function updaterubrics(){
    $rubrics_id = $this->input->get_post('rubrics_id');
  
    $this->db->set('active','0');
    $this->db->where('rubrics_id',  $rubrics_id);
    $this->db->update('lms_rubrics_table');
    // reset query
    $this->db->reset_query();
   }
   

// ADD RUBRICS TITLE //


   public function addrubrics_title(){
    $rubrics = $this->input->get_post('rubrics_title');

    //rubrics title insert
    $this->db->set('rubrics', $rubrics);
    $this->db->insert('lms_rubrics_table');
 
   }

// ADD RUBRICS CRITERIA //

   public function addcriteria(){
    $critirea_description = $this->input->get_post('crit_Des');
    $criteria = $this->input->get_post('criterias');
    $rubrics = $this->input->get_post('rubrics_id');

    foreach($criteria as $rowcriteria){ 
        $query4 = $this->addrubrics_Criteria($rowcriteria,$rubrics);                         
        $query5= $this->select_rubrics_Criteria($rowcriteria,$rubrics);

     foreach($query5->result_array() as $criteria_dess){
        $crit = $criteria_dess['criteria_id'];

                                                          }  
                                                                                                                                           
    foreach($critirea_description as $rowdes){
        if($rowdes['criteria_id'] != $criteria): 
        $query6 = $this->addrubrics_Criteria_desceription($rubrics,$crit,$rowdes);
        endIf;
    
      }                                          
      }
      }

     
   public function addrubrics_Criteria($rowcriteria,$rubrics){ 

    $this->db->set('rubrics_id',$rubrics);
    $this->db->set('criteria',$rowcriteria);
    $this->db->insert('lms_rubrics_criteria');

                                                         }

   public function select_rubrics_Criteria($rowcriteria,$rubrics){
    $this->db->select('*');
    $this->db->where('criteria',$rowcriteria);
    $this->db->where('rubrics_id',$rubrics);
    $query = $this->db->get('lms_rubrics_criteria');
     return $query;                                                   
                                                             } 


   public function addrubrics_Criteria_desceription($rubrics,$crit,$rowdes){
   $this->db->set('rubrics_id',$rubrics);
   $this->db->set('criteria_id',$crit);             
   $this->db->set('description',$rowdes);
   $this->db->set('active','1');
   $this->db->insert('lms_criteria_description');
                       
                                                                } 
   

// DELETE CRITERIA//

public function delete_Criteria(){
    $criteria = $this->input->get_post('criteria_id');

  $this->db->set('active','0');
  $this->db->where('criteria_id',$criteria);
  $this->db->update('lms_rubrics_criteria');
 // reset query
  $this->db->reset_query();
                                  } 
    


// ADD RUBRICS //

public function addrubrics(){
    $rubrics = $this->input->get_post('rubrics_id');
    $rubrics_description = $this->input->get_post('rubrics_description');
    $escale = $this->input->get_post('rubrics_escale');

            $query2 = $this->insert_rubrics_description($rubrics_description,$rubrics);
            foreach($escale as $rowescale){
            $query3 = $this->insert_rubrics_escale($rowescale,$rubrics);
        }
  }

public function insert_rubrics_description($rubrics_description,$rubrics){
$this->db->set('rubrics_id',$rubrics);
$this->db->set('description', $rubrics_description);
$this->db->insert('lms_rubrics_description');

                                                                    }                                                                
public function insert_rubrics_escale($rowescale,$rubrics){
$this->db->set('rubrics_id',$rubrics);
$this->db->set('escale',$rowescale);
$this->db->insert('lms_rubrics_escale');
                                                   }


// Update RUBRICS //
public function update_escale(){
 $rubrics_id = $this->input->get_post('rubrics_id');
 $rubrics = $this->input->get_post('rubrics');

$this->db->set('rubrics',$rubrics);
$this->db->where('rubrics_id',$rubrics_id);
$this->db->update('lms_rubrics_table');

}

         

}


?>