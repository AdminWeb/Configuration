<?php

namespace Configuration\Parser;

interface ParserInterface {
   
    public function addFile($file);
    
    public function getData();
}
