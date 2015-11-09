<?php
use Configuration\Parser\ParserInterface;

class Configuration {

    private $parsers = [];
    
    public function __construct() {
        $this->parsers;
    }
    
    public function attachParser(ParserInterface $parser){
        $this->parsers[$parser::class] = $parser;
    }
    
    public function detachParser(ParserInterface $parser){
        unset($this->parsers[$parser::class]);
    }
}
