<?php
/*
 * Created by Waldemar Graban 2019
 */

class Photo
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function openFile()
    {
        return fopen($this->file, 'a+');
    }

    public function getInfo()
    {
        return exif_read_data($this->file);
    }

    public function showInfo()
    {
        $info = $this->getInfo();
        $tags = $this->getTags($info);

        print("<pre>" . print_r($tags, true) . "</pre>");
    }

    public function getTags($info)
    {
        $tag         = [];
        $arrayobject = new ArrayObject($info);

        for ($iterator = $arrayobject->getIterator(); $iterator->valid(); $iterator->next()) {
            if (is_array($iterator->current())) {
                $arrayValues = $this->getArrayValues($iterator->current());
            }

            $tag += [$iterator->key() => $iterator->current()];
        }

        if ($arrayValues) {
            array_merge($tag, $arrayValues);
        }

        return $tag;
    }

    public function getArrayValues($iterator)
    {
        $tagsFromArray = [];

        foreach ($iterator as $key => $val) {
            $tagsFromArray += [$key => $val];
        }

        return $tagsFromArray;
    }
}

$path_to_photo = "IMG_0241.JPG";
$photo         = new Photo($path_to_photo);
$photo->showInfo();
