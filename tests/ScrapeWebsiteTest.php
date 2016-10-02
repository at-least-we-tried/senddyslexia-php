<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\ScrapeSite;

class ScrapeWebsiteTest extends TestCase
{
    protected $website;

    function setUp()
    {
        $this->website = file_get_contents(__DIR__.'/website.html');
    }

    public function testExample()
    {
        $this->assertTrue((bool) preg_match('/heej heej/', $this->website));
    }

    public function test_converts_css_links_with_relative_path_to_absolute()
    {
        // Med ett slash sist i URL och utan http://
        $site = new ScrapeSite('example.com/', $this->website);
        $this->assertTrue((bool) strpos($site->html, 'http://example.com/relative-path.css'));
    }

    public function test_converts_css_links_with_absolute_path_without_http_or_www()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertTrue((bool) strpos($site->html, 'http://example.com/absolute-path-without-http-www.css'));
    }

    public function test_css_with_absolute_path_remains_untouched()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertTrue((bool) strpos($site->html, 'http://example.com/absolute-path.css'));   
    }

    public function test_converts_relative_img_src()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertTrue( (bool) strpos($site->html, 'http://cdn.example.com/logo.svg') );
    }

    public function test_scripts_has_been_removed()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertFalse( strpos($site->html, 'http://example.com/scripts.js') );
    }

    /*public function test_converts_relative_script_src()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertTrue( (bool) strpos($site->html, 'http://example.com/scripts.js') );
    }*/

}
