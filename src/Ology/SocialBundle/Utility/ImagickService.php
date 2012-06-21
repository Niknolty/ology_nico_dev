<?php

namespace Ology\SocialBundle\Utility;

use \Exception;


class ImagickService {
    /*
     * if you want it to fitbyWeight just let $h=0 (default)
     * if you want it to fitbyheight just put $w=0
     * if you want it to not be resized automatically put both
     * if the picture is smaller then it just copy it
     */

    public static function resizeImage($src, $dest, $w, $h=0, $fit=false) {
//	$f = fopen ('/tmp/resizing.log', 'a');
//	fwrite($f , $src . "\r\n");
//	fclose($f);
	try {
           $img = new \Imagick($src);
	}
 	catch (\ImagickException $e) {
            throw new Exception("Wrong encoding in the file, please change it $e");
	}
        if ($img->getImageWidth() < $w && $img->getImageHeight() < $h) {
            $img->clear();
            $img->destroy();
            $res = copy($src, $dest);
            if (!$res)
                return false;
            // return the smaller size (w || h) if the image is smaller and has been copied
            // Needed for the import only must be check otherwise in after the forme!
            return ($img->getImageWidth() < $img->getImageHeight()) ? $img->getImageWidth() : $img->getImageHeight();
        }
        // resize image
        $type = $img->getimageformat();
        if ($type == 'GIF') {
            $img = $img->coalesceimages();
            do {
                $img->resizeImage($w, $h, $img::FILTER_BOX, 0.5, $fit);
            } while ($img->nextImage());
            $img = $img->deconstructimages();
            $res = $img->writeimages($dest, true);
        } else {
            $img->thumbnailImage($w, $h, $fit);
            $res = $img->writeImage($dest);
        }

        if ($res)
            chmod($dest, 0777);

        $img->clear();
        $img->destroy();

        return $res;
    }

    /*
     * if $h is not put in, then $h = $w
     */

    public static function roundUpImage($src, $dest, $w, $h=0) {

        $file_dest = str_replace(strrchr($dest, '.'), '.png', $dest);

        if ($h == 0)
            $res = self::resizeImageSmaller($src, $dest, $w);
        else
            $res = self::resizeImage($src, $dest, $w, $h, false);

        // if the image if smaller than the original size
        if ($res != 1 && $res != 0)
            $w = $res;

        if ($h == 0) {
            $h = $w;
        }

        $output = null;
        $return_var = null;

        $halfH = $w / 2;
        exec("convert -size " . "$w" . "x$h xc:none -fill $dest -draw 'circle $halfH, $halfH, $halfH,1' $file_dest", $output, $return_var);

        return true;
    }

    /*
     * resize the smaller side to the dimension given (unless smaller)
     */
    public static function resizeImageSmaller($src, $dest, $dim) {
	try {
           $img = new \Imagick($src);
	}
 	catch (\ImagickException $e) {
            throw new Exception("Wrong encoding in the file, please change it $e");
	}
        if ($img->getImageWidth() < $dim || $img->getImageHeight() < $dim) {
            $img->clear();
            $img->destroy();
            return copy($src, $dest);
        }

        if ($img->getImageWidth() < $img->getImageHeight())
            $img->thumbnailImage($dim, 0, false);
        else
            $img->thumbnailImage(0, $dim, false);

        $res = $img->writeImage($dest);
        $img->clear();
        $img->destroy();

        return $res;
    }

}

?>
