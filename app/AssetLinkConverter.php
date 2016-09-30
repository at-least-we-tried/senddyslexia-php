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
        if (strpos($this->assetLink, $domain)) {
            $this->assetLink = str_replace('//'.$domain, '', $this->assetLink);
            return 'http://' . $domain . '/' . $this->assetLink;
        }
        if (strpos($this->assetLink, '//') == 0) {
            $this->assetLink = str_replace('//', 'http://'.$domain.'/', $this->assetLink);
            return $this->assetLink;
        }
    }

}