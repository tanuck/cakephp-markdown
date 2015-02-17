<?php
namespace Tanuck\Markdown\View\Helper;

use Cake\View\Helper;

/**
 * Markdown Helper
 *
 * Render Markdown in your view templates.
 */
class MarkdownHelper extends Helper
{

    /**
     * Default config
     *
     * @var array
     */
    protected $_defaultConfig = [
        'parser' => 'Markdown',
    ];

    /**
     * Parse Markdown input to HTML 5.
     *
     * @param string $input Markdown to be parsed.
     * @return string
     */
    public function transform($input)
    {
        if (!isset($this->parser)) {
            $className = "cebe\\markdown\\{$this->config('parser')}";
            $this->parser = new $className();
            $this->parser->html5 = true;
        }
        return $this->parser->parse($input);
    }
}
