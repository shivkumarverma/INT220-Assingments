<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border:1px solid #000; padding:20px">
    <h2>Upload Documents</h2>
       <form action="upload.php" method="POST" enctype="multipart/form-data" style="margin-bottom :30px;">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
   
     </form>

     <?php

if(isset($_POST['submit'])){

$file = $_FILES['file'];

//print_r($file);

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.',$fileName);

$fileActualExt = strtolower(end($fileExt));

$allowed = array('pdf' , 'png');

if(in_array($fileActualExt,$allowed)){

    if($fileError === 0){

        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = 'documents/'.$fileNameNew;
       
       if( move_uploaded_file($fileTmpName,$fileDestination)){
           
          echo "Files uploaded sucessfully";
          echo "<pre>";
          print_r($file);
       }
       

    }else{
        echo "there was an error uploading your file";
    }

}
else{
    
    echo "Only PDF and PNG formats are supported";

}

}

?>
     </div>  
    
</body>
</html>

