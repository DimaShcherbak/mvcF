<?php


namespace application\lib;


class ImageUpload
{
    public $fileFullPath;

    public function upload($file, $path)
    {
        $this->fileFullPath =  $path . time() . '_' . $file['name'];
        $maxDim = 800;
        $file_name = $file['tmp_name'];
        list($width, $height, $type, $attr) = getimagesize($file_name);
        if ($width > $maxDim || $height > $maxDim) {
            $target_filename = $file_name;
            $ratio = $width / $height;
            if ($ratio > 1) {
                $new_width = $maxDim;
                $new_height = $maxDim / $ratio;
            } else {
                $new_width = $maxDim * $ratio;
                $new_height = $maxDim;
            }
            $src = imagecreatefromstring(file_get_contents($file_name));
            $dst = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagedestroy($src);
            imagepng($dst, $target_filename); // adjust format as needed
            imagedestroy($dst);
            return move_uploaded_file($file_name, $_SERVER['DOCUMENT_ROOT'] . $this->fileFullPath);
        }else{
            return move_uploaded_file($file_name, $_SERVER['DOCUMENT_ROOT'] . $this->fileFullPath);
        }

        return false;

    }

}