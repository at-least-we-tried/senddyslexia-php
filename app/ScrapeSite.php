<?php

namespace App;

class ScrapeSite {

    protected $url;
    public $html;

    /**
     * Named constructor
     * @param  string $url The URL of the site to be scraped
     * @return ScrapeSite A new instance of the ScrapeSite class
     */
    public static function url($url)
    {
        try {
            $html = file_get_contents($url);
        } catch (Exception $e) {
            // TODODODODO            
        }
        return new ScrapeSite($url, $html);
    }

    public function __construct($url, $html)
    {
        $this->url = $url;
        $this->html = $html;
        $this->makeAssetLinksAbsolute();
    }

    protected function makeAssetLinksAbsolute()
    {
        $this->html = str_replace('href="//', 'href="' . $this->url . '/', $this->html);
    }

}