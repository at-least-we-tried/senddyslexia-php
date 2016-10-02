<?php

namespace App;

class AssetLinkConverter {

    protected $assetLink;

    public static function fromRelative($assetLink)
    {
        return new AssetLinkConverter($assetLink);
    }

    public function __construct($assetLink)
    {
        $this->assetLink = $assetLink;
    }

    public function toAbsolute($domain)
    {
        if (preg_match('/https?:\/\//', $this->assetLink)) return $this->assetLink;
        
        if (is_integer(strpos($this->assetLink, '//'))) {
            return 'http:' . $this->assetLink;
        }
        return 'http://' . $domain . $this->assetLink;
    }

}