<?php

namespace App;

class ScrapeSite {

    protected $html;

    /**
     * Named constructor
     * @param  string $url The URL of the site to be scraped
     * @return ScrapeSite A new instance of the ScrapeSite class
     */
    public static function url($url)
    {
        $html = file_get_contents($url);
        return new ScrapeSite($html);
    }

    public function __construct($html)
    {
        $this->html = $html;
    }


    public function print()
    {
        return $this->html;
    }

}