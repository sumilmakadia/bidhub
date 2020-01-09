<?php
    include('../../../src/php/class.fileuploader.php');

	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
		'limit' => null,
		'fileMaxSize' => null,
		'extensions' => null,
        'uploadDir' => '../uploads/',
        'title' => 'auto'
    ));
	
	// call to upload the files
    $data = $FileUploader->upload();

	// export to js
	echo json_encode($data);
	exit;