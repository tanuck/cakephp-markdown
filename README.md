# CakePHP Markdown

[![Build Status](https://secure.travis-ci.org/tanuck/cakephp-markdown.svg?branch=master)](http://travis-ci.org/tanuck/cakephp-markdown)

CakePHP 3 plugin to parse markdown syntax in your view templates.

## Installation

Include the following in your `composer.json` file:

```
    "require": {
        "tanuck/cakephp-markdown": "dev-master"
    }
```

and then run:

`composer update`

## Configuration & Usage

To your `config/bootstrap.php` file add `Plugin::load('Tanuck/Markdown');`

Then, load the helper where needed. For example, in your controller:

```php
    class FooController extends AppController
    {
        public $helpers = ['Tanuck/Markdown.Markdown'];
    }
```

then in your templates, you can output markdown syntax like so:

```php
    echo $this->Markdown->transform($myMarkdownSyntax);
```

### Advanced Configuration

Markdown is rendered using the [cebe/markdown](https://github.com/cebe/markdown) library which offers 3 different markdown parser classes.

* Markdown - using the original syntax definition: [http://daringfireball.net/projects/markdown/syntax](http://daringfireball.net/projects/markdown/syntax)
* GithubMarkdown - GitHubs own markdown flavour: [https://help.github.com/articles/github-flavored-markdown/](https://help.github.com/articles/github-flavored-markdown/)
* MarkdownExtra - an extension of the original by michelf: [http://michelf.ca/projects/php-markdown/extra/](http://michelf.ca/projects/php-markdown/extra/)

By default, the plugin will use Markdown, the first of the 3 above. However you can specify which of the 3 you use wish to use when loading the helper. Like so:

```php
    class FooController extends AppController
    {
        public $helpers = [
            'Tanuck/Markdown.Markdown' => [
                'parser' => 'GithubMarkdown'
            ]
        ];
    }
```

## License

Asset Compress is offered under an [MIT license](http://www.opensource.org/licenses/mit-license.php).
