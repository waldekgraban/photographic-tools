<?php
/**
 * Created by Waldemar Graban 2020
 */

class Base64Encoder
{
    private $image;

    public function __construct($image){
        $this->image = $image;
    }

    public function getPathToFile(){
        return file_get_contents($this->image);
    }

    public function encode()
    {
        return base64_encode($this->getPathToFile());
    }

    public function showResult()
    {
        echo '<img src="'. $this->encode() .'">';
    }
}

$image = "0.jpg";   //pathToFile
$encoder         = new Base64Encoder($image);
$encoder->showResult();