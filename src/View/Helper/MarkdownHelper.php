<?php
namespace Tanuck\Markdown\View\Helper;

use Cake\View\Helper;
use cebe\markdown\GithubMarkdown;

/**
 * Markdown Helper
 *
 * Render Markdown in your view templates.
 */
class MarkdownHelper extends Helper
{

    /**
     * Parse Markdown input to HTML 5.
     *
     * @param string $input Markdown to be parsed.
     * @return string
     */
    public function transform($input)
    {
        if (!isset($this->parser)) {
            $this->parser = new GithubMarkdown();
            $this->parser->html5 = true;
        }
        return $this->parser->parse($input);
    }
}
