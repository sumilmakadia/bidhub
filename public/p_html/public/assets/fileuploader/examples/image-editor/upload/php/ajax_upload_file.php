<?php
    include('../../../../src/php/class.fileuploader.php');

	$isAfterEditing = false;

	// if after editing
	if (isset($_POST['fileuploader']) && isset($_POST['_editorr'])) {
		$isAfterEditing = true;
	}
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'limit' => null,
		'fileMaxSize' => null,
		'extensions' => ['image/*'],
        'uploadDir' => '../uploads/',
        'title' => 'name',
		'replace' => $isAfterEditing,
		'editor' => array(
			'maxWidth' => 1280,
			'maxHeight' => 720,
			'crop' => false,
			'quality' => 90
		),
    ));
	
	// call to upload the files
    $upload = $FileUploader->upload();

	// export to js
	echo json_encode($upload);
	exit;