<?php 

$ruta="../../public/img/noticias/";//ruta carpeta donde queremos copiar las imágenes
$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
$uploadfile_nombre=$ruta.$_FILES['imagen']['name'];

if (is_uploaded_file($uploadfile_temporal)) {
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
} else {
	echo "error";
}
$directorio=opendir("../../public/img/noticias/");
$ficheros=readdir($directorio);
//$url="../../public/img/noticias/".$ficheros;
//echo "<img src=".$url.">";
echo "<img src=".$uploadfile_nombre.">";
print_r($uploadfile_nombre);


//function cargarImagen($imagen) {

/*	if (isset($_POST)) {

		$target_dir = "../public/img/noticias/";
		$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST)) {
		    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
		    if($check !== false) {
		        print_r("File is an image - " . $check["mime"] . ".");
		        $uploadOk = 1;
		    } else {
		        print_r("File is not an image.");
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    print_r("Sorry, file already exists.");
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["imagen"]["size"] > 5000000) {
		    print_r("Sorry, your file is too large.");
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    print_r("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    print_r("Sorry, your file was not uploaded.");
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
		        print_r("The file ". basename( $_FILES["imagen"]["name"]). " has been uploaded.");
		       // return $target_file;
		    } else {
		        print_r("Sorry, there was an error uploading your file.");
		       // return "error";
		    }
		}
	}*/

//}

?>