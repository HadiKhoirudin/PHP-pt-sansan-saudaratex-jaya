<?php
set_time_limit(0);
$uploadpath=(string)filter_input(INPUT_POST, 'uploadpath');
$response = array();
$result = array();

function exit_with_error ($msg) {
    $response = array();
    $response["error"] = true;
    $response["message"] = $msg;
    echo json_encode($response,JSON_HEX_TAG);
    die;
}

function codeToMessage($code) { 
    switch ($code) { 
        case UPLOAD_ERR_INI_SIZE: 
            $message = "File too big. Check \"upload_max_filesize\" in php.ini."; 
            break; 
        case UPLOAD_ERR_FORM_SIZE: 
            $message = "File too big. Check \"MAX_FILE_SIZE\" specified on HTML form.";
            break; 
        case UPLOAD_ERR_PARTIAL: 
            $message = "File partially uploaded."; 
            break; 
        case UPLOAD_ERR_NO_FILE: 
            $message = "File not uploaded."; 
            break; 
        case UPLOAD_ERR_NO_TMP_DIR: 
            $message = "Temporary folder not availaible."; 
            break; 
        case UPLOAD_ERR_CANT_WRITE: 
            $message = "Write error on file-system."; 
            break; 
        case UPLOAD_ERR_EXTENSION: 
            $message = "Upload blocked by extension."; 
            break; 

        default: 
            $message = "General error."; 
            break; 
    } 
    return $message; 
}

set_error_handler(function ($errno, $errstr, $errfile, $errline ,array $errcontex) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});
try {
	// if single file
    if(!is_array($_FILES["userfile"]["name"])) { 
        if ($_FILES["userfile"]["error"] === UPLOAD_ERR_OK) {
            $fileName = $_FILES["userfile"]["name"];
            if (!move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadpath.DIRECTORY_SEPARATOR.$fileName)) {
                $msg="Upload not completed.<br />Error on copy file \"".$fileName."\" in folder \"".$uploadpath."\"";
                exit_with_error($msg);
            }
        }
        else {
            $upldmsg = codeToMessage($_FILES["userfile"]["error"]);
            $msg = "Upload not completed.<br />\"".$_FILES["userfile"]["name"]."\" : ".$upldmsg;
            exit_with_error($msg);
        }
    }
	//else if Multiple files
    else { 
        $fileCount = count($_FILES["userfile"]["name"]);
        for($i=0; $i < $fileCount; $i++) {
            if ($_FILES["userfile"]["error"][$i] === UPLOAD_ERR_OK) {
                $fileName = $_FILES["userfile"]["name"][$i];
                if (!move_uploaded_file($_FILES["userfile"]["tmp_name"][$i],$uploadpath.DIRECTORY_SEPARATOR.$fileName)) {
                    $msg="Upload not completed.<br />Error on copy file \"".$fileName."\" in folder \"".$uploadpath."\"";
                    exit_with_error($msg);
                }
            }
            else {
                $upldmsg = codeToMessage($_FILES["userfile"]["error"][$i]);
                $msg = "Upload not completed.<br />\"".$_FILES["userfile"]["name"][$i]."\" : ".$upldmsg;
                exit_with_error($msg);
            }
        }	
    }
} catch (ErrorException $e) {
    $response["error"] = true;
    $msg = "ERROR: Upload not completed.<br /><br /><br/><b>URL:</b> ".$_SERVER['PHP_SELF']."<br />"
            . "<b>Error on line n. :</b> ".$e->getLine()."<br/><b>MESSAGE:</b><br />";
    $response["message"] = $msg.$e->getMessage();
    echo json_encode($response,JSON_HEX_TAG);
    die;    
}

$response["error"] = false;
echo json_encode($response);

?>