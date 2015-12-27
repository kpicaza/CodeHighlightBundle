CodeHighlightBundle
===================

Simple way to display highighted code in our content using highlight.js library.

[![knpbundles.com](http://knpbundles.com/kpicaza/CodeHighlightBundle/badge)](http://knpbundles.com/kpicaza/CodeHighlightBundle)

##1. Instalation:

Add the following to your composer json:

    // composer.json
    "require": {
        ...,
        "components/highlightjs": "^9.0",
        "kpicaza/code-highlight-bundle": "0.1.x-dev",
        ...
    }

or open console and type

    composer require kpicaza/code-highlight-bundle=dev-master

Activate bundle in your kernel:

    // app/AppKernel.php
    public function registerBundles()
    {
        $bundles = array(
          ...
          new Kpicaza\Bundle\CodeHighlightBundle\CodeHighlightBundle(),
          ...
    }

Enable routing (optional, only if you wish to play demo at http://you_site.com/highlight/hello/{name}):

    // app/config/routing.yml
    code_highlight:
        resource: "@CodeHighlightBundle/Resources/config/routing.yml"
        prefix:   /hightlight


##2. Config:

Now we need to update Assetic configuration to enable js and css from highlight.js library

    // app/config/config.yml
    # Assetic Configuration
    assetic:
        ...
        bundles:        [ CodeHighlightBundle ] #enables bundle mapping by assetic
        ...
        assets:
            ...
            highlight_js: # enable javascript library
                inputs:
                    - %kernel.root_dir%/../vendor/components/highlightjs/highlight.pack.min.js
                output: js/highlight.js
            # Import wanted themes for highlight see https://highlightjs.org/static/demo/
            # for example I'm going to enable two themes, monokai_sublime and github
            highlight_monokai_sublime_css:
                inputs:
                    - %kernel.root_dir%/../vendor/components/highlightjs/styles/monokai_sublime.css
                output: css/highlight.css
            highlight_github_css:
                inputs:
                    - %kernel.root_dir%/../vendor/components/highlightjs/styles/github.css
                output: css/highlight.css


##3. Usage:

###3.1 Basic Usage:

Add stylesheet and init javascript in your template

    <html>
        <title>CodeHighlightBundle Demo</title>
        <head>
            {{ highlight_theme('monokai_sublime') }}
        </head>
        <body>
            ...
            <footer>
                ...
            </footer>
            <!-- Include all JavaScripts, compiled by Assetic -->
            <script src="{{ asset('js/jquery.js') }}"></script>
            {{ highlight_init_js() }}

        </body>
    </html>

Add "hljs" and programming language name as classes to html "pre" tag to highlight content, for example:

    <pre class="hljs php">
        class MyClass {
            private $foo;

            public function _construct($foo = null)
            {
                $this->foo = $foo;
            }
        }

    </pre>


###3.2 Advanced Usage:
@todo    

##4. @todo
- 4.1 Adbanced usage documentation
- 4.2 only add templating service as depency instead of service_container
- 4.3 tests
