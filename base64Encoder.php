<?php
/**
 * Created by Waldemar Graban 2020
 */

class Base64Encoder
{
    private $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function getPathToFile()
    {
        return file_get_contents($this->image);
    }

    public function encode()
    {
        return base64_encode($this->getPathToFile());
    }

    public function getResult()
    {
        echo $this->encode();
    }

    public function showResult()
    {
        echo '<img src="data:image/png;base64, '. $this->getResult() .' "/>';
    }
}

$image   = "test.png"; //pathToFile
$encoder = new Base64Encoder($image);
$encoder->showResult();
