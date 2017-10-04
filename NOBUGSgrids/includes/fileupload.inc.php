<?php

if (isset($_POST['button'])) {

  include 'dbh.inc.php';

	$file = $_FILES['file'];

	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

  $autor = mysqli_real_escape_string($conn,$_POST['autor']);
  $pchave = mysqli_real_escape_string($conn,$_POST['pchave']);
  $area = mysqli_real_escape_string($conn,$_POST['area']);
  $resumo = mysqli_real_escape_string($conn,$_POST['resumo']);

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000000) {

        $fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "INSERT INTO upload(nome, autor, pchave, area, resumo, path) VALUES('$fileName', '$autor', '$pchave', '$area', '$resumo','$fileDestination')";
        $result = mysqli_query($conn, $sql);
        header("Location: ../upload.php?success");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
?>
