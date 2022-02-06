<?php
if(isset($_POST['submit'])){
   
   $new_message = array(
      "Name" => $_POST['Name'],
      "Email" => $_POST['Email'],
      "Phone" => $_POST['Phone'],
      "EmailNumber" => $_POST['EmailNumber'],
      "DateOfAdmission" => $_POST['DateOfAdmission'],
   );
 
   if(filesize("student.json") == 0){
      $first_record = array($new_message);
      $data_to_save = $first_record;
   }else{
      $old_records = json_decode(file_get_contents("student.json"));
      array_push($old_records, $new_message);
      $data_to_save = $old_records;
   }
 
   $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);
 
   if(!file_put_contents("student.json", $encoded_data, LOCK_EX)){
      $error = "Error storing message, please try again";
   }else{
      $success =  "Le message a été bien envoyé";
   }
}

?>