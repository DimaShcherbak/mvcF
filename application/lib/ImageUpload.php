<?php


namespace application\lib;


class ImageUpload
{
    public $fileFullPath;

    public function upload($file, $path)
    {

        $this->fileFullPath =  $path . time() . '_' . $file['name'];
        $minWidth = 800;
        $minHeight = 450;
        $file_name = $file['tmp_name'];
        list($width, $height, $type, $attr) = getimagesize($file_name);
        if ($width >= $minWidth && $height >= $minHeight) {
//            $target_filename = $file_name;
//            $ratio = $width / $height;
//            if ($ratio > 1) {
//                $new_width = $maxDim;
//                $new_height = $maxDim / $ratio;
//            } else {
//                $new_width = $maxDim * $ratio;
//                $new_height = $maxDim;
//            }
            $src = imagecreatefromstring(file_get_contents($file_name));
            $dst = imagecreatetruecolor($minWidth, $minHeight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $minWidth, $minHeight, $width, $height);
            imagedestroy($src);
            imagepng($dst, $file_name); // adjust format as needed
            imagedestroy($dst);
            return move_uploaded_file($file_name, $_SERVER['DOCUMENT_ROOT'] . $this->fileFullPath);
        }
        $_SESSION['error'] = 'Ширина или высота не соответсвует требуемым параметрам'.' '.$minWidth .'* '.$minHeight;

        return false;

    }

}