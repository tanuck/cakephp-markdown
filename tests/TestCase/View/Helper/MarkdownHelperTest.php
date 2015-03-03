<?php
namespace Tanuck\Markdown\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Tanuck\Markdown\View\Helper\MarkdownHelper;

/**
 * Tanuck\Markdown\View\Helper\MarkdownHelper Test Case
 */
class MarkdownHelperTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $View = new View();
        $this->markdown = new MarkdownHelper($View);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($View);
        unset($this->markdown);
    }

    /**
     * Test transform method
     *
     * @return void
     */
    public function testTransform()
    {
        // test markdown parsing
        $expected = "<h1>Markdown h1 header</h1>\n";
        $markdown = '# Markdown h1 header';
        $this->assertEquals($expected, $this->markdown->transform($markdown));

        $this->assertInstanceOf('cebe\markdown\Markdown', $this->markdown->parser);

        // check error checking for non string input
        $this->assertNull($this->markdown->transform(1234));
        $this->assertNull($this->markdown->transform(true));
        $this->assertNull($this->markdown->transform([]));
    }

    /**
     * Test parser instance when on-helper-load config is used.
     *
     * @return void
     */
    public function testParserClassSetOnLoad()
    {
        $this->markdown = new MarkdownHelper(new View(), ['parser' => 'GithubMarkdown']);

        $expected = "<p><del>Strikethrough text</del></p>\n";
        $markdown = '~~Strikethrough text~~';
        $this->assertEquals($expected, $this->markdown->transform($markdown));

        $this->assertInstanceOf('cebe\markdown\GithubMarkdown', $this->markdown->parser);
    }
}
