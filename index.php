<?php
//Initialise the cURL var
//$file_name_with_full_path = realpath('test.png');
//echo $file_name_with_full_path;exit;
//$curl_handle = curl_init("http://ourdesigngroup.com/photos");
// 
//curl_setopt($curl_handle, CURLOPT_POST, 1);
//$args['file'] = new CurlFile($file_name_with_full_path, 'image/png');
//curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $args); 
//curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
//
// 
//execute the API Call
//$returned_data = curl_exec($curl_handle);
//curl_close ($curl_handle);
//
//echo $returned_data;
//
if(isset($_POST['check_submit']))
{ 
    $tmpfile = $_FILES['assets']['tmp_name'];
    $filename = basename($_FILES['assets']['name']); 
    $filetype = $_FILES['assets']['type']; 
    
/* 
As the @ format is now deprecated. Use curl_file_create function instead as below
       $POST_DATA = array(
   'file' => '@'.$tmpfile.';filename='.$filename
  );
*/

    $POST_DATA = array(
   'file' => curl_file_create($tmpfile, $filetype, $filename)
  );

    // Connecting to external api via cURL
    $curl_handle = curl_init("http://ourdesigngroup.com/photos");  
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $POST_DATA); 
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
   
    //execute the API Call
    $returned_data = curl_exec($curl_handle);
    curl_close ($curl_handle);
 
    echo $returned_data;
}
?>


<form method="POST" action="" enctype="multipart/form-data">

<p>Select a file to upload : </p>

<input type="file" name="assets">

<input type="submit" name="check_submit"/>

</form>
