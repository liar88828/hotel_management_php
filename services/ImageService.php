<?php

class ImageService
{
    function saveImage($responseDB, $image, string $dir = "images/person/", $id = 1)
    {
        try {

            if ($responseDB) {
                if ($image) {
                    $target_dir = $dir;
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
            } else {
                throw new Exception("DB Error");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function deleteImage(string $imagePath)
    {
        try {
            if (file_exists($imagePath)) {
                if (unlink($imagePath)) {
                    return "Image deleted successfully.";
                } else {
                    throw new Exception("Failed to delete image.");
                }
            } else {
                throw new Exception("Image not found.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}