<?php
    if (isset($_FILES['uploadedfile'])) {

        $filename = $_FILES['uploadedfile']['name'];

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if ($extension !== 'jpg') {
            die('Only JPG files are allowed.');
        }

        move_uploaded_file(
                $_FILES['uploadedfile']['tmp_name'],
                __DIR__ . '/uploads/' . $filename
        );

        echo "File uploaded successfully.";
    }
?>

<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1024">
    <input type="file" name="uploadedfile">
    <input type="submit" value="Upload File">
</form>