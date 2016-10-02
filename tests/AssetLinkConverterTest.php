<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\AssetLinkConverter;

class AssetLinkConverterTest extends TestCase
{
    protected $domain = 'example.com';
    protected $expected = 'http://example.com/style.css';

    public function test_converts_relative_path()
    {
        $href = '/style.css';
        $link = AssetLinkConverter::fromRelative($href)->toAbsolute($this->domain);
        $this->assertEquals($this->expected, $link);
    }

    public function test_converts_absolute_path_without_http_www()
    {
        $href = '//other-domain.com/style.css';
        $link = AssetLinkConverter::fromRelative($href)->toAbsolute($this->domain);
        $this->assertEquals('http://other-domain.com/style.css', $link);
    }

    public function test_svt_logo()
    {
        $src = '/static/svtse-render/images/logotypes/svtlogo-black_v2.png';
        $link = AssetLinkConverter::fromRelative($src)->toAbsolute('svt.se');
        $this->assertEquals('http://svt.se'.$src, $link);
    }
}
