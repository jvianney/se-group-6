<?php

/**
	 *@author Emmanuel Nii Tackie <emmanuel.tackie@ashesi.edu.gh.com>
	 *@version 1 
	 */

if(isset($_FILES['file']))
$file = $_FILES['file'];
{
        
    
    /* Tests to see whether form works as well as file type uploaded  
    print_r($file);
    */
    
    
    /*
    File properties
    @variable $fileName contains the name of the file
    @variable $fileTmp contains the temporary location of the file
    @variable $fileType contains the file type of the uploaded file
    @variable $fileSize contains the file size of the file
    @variable $fileError contians the errors encounted in file uploads
    
    
    
    
    */
    
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    
    
    /*white listing file extensions

    This initialization stores into $fileExtention the exploaded filename, ie. puts it into an array
   
   */
    
    $fileExtension = explode('.', $fileName);
    
    /* tests array
    print_r($fileExtension);
    */
    
  /*converts the last element of the array which is the file extension to lower case
  
  */
    
    $fileExtension = strtolower(end($fileExtension));
    
    
    
    $allowed = array('txt', 'pdf', 'docx', 'pages');
    
    
    if(in_array($fileExtension,$allowed)=== false){
         $errors[]="extension not allowed, please choose a txt,  pdf, docx or pages file extension.";
      }
      
      if($fileSize > 5242880){
         $errors[]='File size must be excately 5 MB';
		}
      
      if(empty($errors)==true){
         move_uploaded_file($fileTmp,"upload/".$fileName);
         echo "Success";
      }
    
      else
      {
         print_r($errors);
      }
    
}
    
