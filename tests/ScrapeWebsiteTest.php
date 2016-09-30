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
        $this->website = str_replace('href="//', 'href="http://example.com/', $this->website);
        
        $site = new ScrapeSite($this->website);

        $this->assertTrue((bool) strpos($site->print(), 'http://example.com/relative-path.css'));
    }

}
