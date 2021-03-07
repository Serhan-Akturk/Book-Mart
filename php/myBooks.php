<?php
    include "../includes/dbconnect.inc.php";

    if(isset($_POST["sendFile"])){
        // var_dump($_FILES["uploadFile"]);

        if(isset($_FILES["uploadFile"]["type"]) && $_FILES["uploadFile"]["name"] == UPLOAD_ERR_OK){
            $target_dir = "../tempFolder/";
            $target_file = $target_dir.basename($_FILES["uploadFile"]["name"]);

            // echo "<br>".$target_file. "<br>";

            $file_type = pathinfo($target_file,PATHINFO_EXTENSION);

            $accepted = array("pdf","PDF","word","WORD","docx","DOCX");
            
            if(!in_array($file_type, $accepted)){
                echo "<script>alert('Word/Docx/Pdf only');</script>";
            }else if(!move_uploaded_file($_FILES["uploadFile"]["temp-name"], $target_file)){
                echo "<script>alert('Error Uploading File'".$_FILES["uploadFile"]["error"]. ");</script>";
            }else{
                echo "<script>alert('File Uploaded');</script>";
            }
        }
        else{
            switch($_FILES["uploadFile"]["error"]){
                case UPLOAD_ERR_INI_SIZE:
                    $message = "File is larger than allowed server size";
                break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = "File larger than Script Allows";
                break;
                case UPLOAD_ERR_NO_FILE:
                    $message = "No file was Uploaded. Make sure you choose the right File";
                break;
                default:
                $message = "Contact your server admin for help";
            } echo "Sorry there was a problem uploading the file " .$message;
        }
    }

?>