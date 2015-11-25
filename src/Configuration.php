<?php

namespace Configuration;

use Configuration\Parser\ParserInterface;
use Countable;
use Configuration\Parser\PHPParser;
use Configuration\Parser\JsonParser;

class Configuration implements Countable {

    private $parsers = [];

    public function __construct() {
        $this->parsers[PHPParser::class] = new PHPParser();
        $this->parsers[JsonParser::class] = new JsonParser();
    }

    public function attachParser(ParserInterface $parser) {
        $object = get_class($parser);
        !isset($this->parsers[$object]) ?
                        $this->parsers[$object] = $parser : null;
    }

    public function dettachParser(ParserInterface $parser) {
        unset($this->parsers[get_class($parser)]);
    }

    public function count() {
        return $this->parsers;
    }

    public function factory($file) {
        $config = null;
        if (file_exists($file)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $file);
            finfo_close($finfo);
            switch ($mime){
                case 'text/x-php':
                    $this->parsers[PHPParser::class]->addFile($file);
                    $config = $this->parsers[PHPParser::class];
                    break;
                case 'application/json':
                    $this->parsers[JsonParser::class]->addFile($file);
                    $config = $this->parsers[JsonParser::class];
                    break;
            }            
        }
        return $config;
    }

}
