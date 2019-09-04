<?php require_once('file_with_five_methods.php'); 
$pdf = new PDF();
if(isset($_POST['certificate'])){
    $name=$_POST['name'];
    $id=$_POST['id'];
    $email=$_POST['email'];
    $pdf->Certificate($name,$id,$email);
}
elseif(isset($_POST['write_pdf'])){
    include ('all_delete_files.php');
    $header_content = $_POST['header'];
    $footer_content = $_POST['footer']; 
    $file_name = $_FILES['pdf_file']['name'];
    $path = $_FILES['pdf_file']['tmp_name']; 
    $target_path = 'Files/'.$file_name; 
     move_uploaded_file($path, $target_path); 
    $pdf->pdf_write_when_upload($file_name,$header_content,$footer_content);
}
elseif(isset($_POST['id_card_pdf'])){
    $name=$_POST['name'];
    $id=$_POST['id'];
    $pdf->id_card_pdf($id,$name);
}
elseif(isset($_POST['coupon'])){
    $breakfast=''; 
    $lunch='';
    $dinner='';
    $date=$_POST['date'];
    $category=$_POST['category'];
    foreach ($category as $item){ 
        if(strcmp($item,"breakfast")==0){
            $breakfast=$item;}
        if(strcmp($item,"lunch")==0){
            $lunch=$item;}
       if(strcmp($item,"dinner")==0){
            $dinner=$item;}
}
    
    $pdf->coupon_pdf($date,$breakfast,$lunch,$dinner);
}
elseif(isset($_POST['visa_letter_pdf'])){
    $ref=$_POST['ref'];
    $date=$_POST['date'];
    $to=$_POST['to'];
    $committee=$_POST['committee'];
    $paper_id=$_POST['paper_id'];
    $paper_title=$_POST['paper_title'];
    $meeting_place=$_POST['meeting_place'];
    $director_info=$_POST['director_info'];
    $pdf->visa_letter_pdf($ref,$date,$to,$committee,$paper_id,$paper_title,
                          $meeting_place,$director_info);
}
else{
    echo 'Opps !!! You Can Not Access This Page Directly !!!';
}
?>











