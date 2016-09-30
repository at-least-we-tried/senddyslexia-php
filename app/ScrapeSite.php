<?php

namespace App;

class ScrapeSite {
    public function __construct($html)
    {
        
    }

    public static function url($url)
    {
        $html = file_get_contents($url);
        return new self();
    }

}