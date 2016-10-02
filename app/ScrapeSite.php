<?php

namespace App;

use DOMDocument;

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
        if (!preg_match('/https?:\/\//', $url)) {
            $url = 'http://' . $url;
        }
        try {
            $html = file_get_contents($url);
        } catch (Exception $e) {
            // TODODODODO            
        }
        return new ScrapeSite($url, $html);
    }

    public function __construct($url, $html)
    {
        $this->url = $this->cleanURL($url);
        $this->html = $html;
        $this->makeAssetLinksAbsolute();
        $this->removeScriptTags();
    }

    protected function cleanURL($url)
    {
        if (substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
        }
        if (preg_match('/https?:\/\//', $url)) {
            $url = explode('//', $url)[1];
        }
        return $url;
    }

    protected function makeAssetLinksAbsolute()
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($this->html);
        $assetLinks = [
            'link' => 'href',
            'img' => 'src',
            'script' => 'src'
        ];
        foreach ($assetLinks as $element => $attribute) {
            $tags = $dom->getElementsByTagName($element);
            foreach ($tags as $linkTag) {
                if ($linkTag->hasAttribute($attribute)) {
                    $href = AssetLinkConverter::fromRelative($linkTag->getAttribute($attribute))
                        ->toAbsolute($this->url);
                    $linkTag->setAttribute($attribute, $href);
                }
            }
        }
        $this->html = $dom->saveHTML();
    }

    protected function removeScriptTags()
    {
        $dom = new DOMDocument;
        @$dom->loadHTML($this->html);
        $scriptTags = $dom->getElementsByTagName('script');
        if ($scriptTags) {
            foreach ($scriptTags as $scriptTag) {
                $scriptTag->parentNode->removeChild($scriptTag);
            }
        }
        $this->html = $dom->saveHTML();
    }

}