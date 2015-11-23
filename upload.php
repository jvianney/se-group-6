<?php

if(isset($_FILES['file']))
{
    $file = $_FILES['file'];
    
    /* Tests to see whether form works as well as file type uploaded  
    print_r($file);
    */
    
    //File properties
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
    
    
    /*files allowed
    
    */
    $allowed = array('txt', 'pdf', 'docx', 'pages');
    
    
    
    if(in_array($fileExtension, $allowed) && $fileSize <= 5242880 && $fileError == 0)
    
    {
        //'project/' is the name of the destination folder on my localhost. In the final submission this will change the server directory 
        $fileDestination = 'project/';
    }
    
    if(move_uploaded_file($fileTmp,  $fileDestination ))
    {
        echo "The file was successfully uploaded to" . $fileDestination;
    }
   
        
        
        
     
    
    
    
    
    
    
}