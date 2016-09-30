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
        $this->assertTrue(is_numeric(strpos($this->website, 'heej heej')));
    }

    public function test_converts_css_links_with_relative_path_to_absolute()
    {
        $site = new ScrapeSite('http://example.com', $this->website);

        $this->assertTrue((bool) strpos($site->html, 'http://example.com/relative-path.css'));
    }

    public function test_converts_css_links_with_absolute_path_without_http_or_www()
    {
        $site = new ScrapeSite('http://example.com', $this->website);
        $this->assertTrue((bool) strpos($site->html, 'http://example.com/absolute-path-without-http-www.css'));
    }

}
