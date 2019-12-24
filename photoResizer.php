<?php
/**
 * Created by Waldemar Graban 2019
 */

class PhotoResizer
{
    private $file;
    private $outputFormat;
    private $desiredWidth;
    private $desiredHeight;

    public function __construct($file, $outputFormat, $desiredWidth, $desiredHeight)
    {
        $this->file          = $file;
        $this->outputFormat  = $outputFormat;
        $this->desiredWidth  = $desiredWidth;
        $this->desiredHeight = $desiredHeight;
    }

    public function getImageName()
    {
        return pathinfo($this->file, PATHINFO_FILENAME);
    }

    public function getImageExtension()
    {
        return pathinfo($this->file, PATHINFO_EXTENSION);
    }

    public function getDataTime()
    {
        return date('h-i-s', time());
    }

    public function resizeImage()
    {
        $date    = $this->getDataTime();
        $resized = $this->file;
        $resized->resizeImage($this->desiredWidth, $this->desiredHeight, Imagick::FILTER_LANCZOS, 1);
        $resized->writeImage($date . '-' . $this->desiredWidth . '-' . $this->desiredHeight . '_resized.' . $this->outputFormat);
        $resized->clear();
        $resized->destroy();
    }
}

$file          = new Imagick('path/to/myImage.png');
$outputFormat  = 'jpg';
$desiredWidth  = 320;
$desiredHeight = 240;

$im = new PhotoResizer($file, $outputFormat, $desiredWidth, $desiredHeight);
$im->resizeImage();
