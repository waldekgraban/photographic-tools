<?php
<?php
/*
 *
 * Created by Waldemar Graban 2019
 *
 */

class Photo
{
    private $file;

    function __construct($file)
    {
        $this->file = $file;
    }

    function openFile()
    {
        return fopen($this->file, 'a+');
    }

    function getInfo()
    {
        return exif_read_data($this->file);
    }

    function showInfo()
    {
        foreach($this->getInfo() as $parameter => $value)
        {
            if(is_array($value)){
                foreach($value as $val){
                    echo $parameter . ' : ' . $val . '<br>';
                }
            } else {
                echo $parameter . ' : ' . $value . '<br>';
            }
        }
    }
}

$path_to_photo = "path/to/image.jpg";   //Add file
$photo = new Photo($path_to_photo);
$photo->showInfo();
