<?php
namespace Configuration\Parser;

class PHPParser implements ParserInterface{
    
    private $data = [];  
    
    public function getData() {
        return $this->data;
    }

    public function addFile($file) {
        if(file_exists($file)){
            $this->data = require($file);
        }
    }

}
