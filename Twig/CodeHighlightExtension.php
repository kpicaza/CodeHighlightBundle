<?php

// src/AppBundle/Twig/AppExtension.php

namespace Kpicaza\Bundle\CodeHighlightBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class CodeHighlightExtension extends \Twig_Extension
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Gets a service.
     *
     * @param string $id The service identifier
     *
     * @return object The associated service
     */
    public function getService($id)
    {
        return $this->container->get($id);
    }

    public function getFunctions()
    {
        return array(
          'highlight_theme' => new \Twig_SimpleFunction('highlight_theme', array($this, 'highlightThemeFunction'), array('is_safe' => array('html'))),
          'highlight_init_js' => new \Twig_SimpleFunction('highlight_init_js', array($this, 'highlightInitJsFunction'), array('is_safe' => array('html'))),
        );
    }

    /**
     * 
     * @param type $str
     * @return type
     */
    public function highlightThemeFunction($str = 'github')
    {
        $template = 'CodeHighlightBundle:Default:stylesheets_' . $str . '.html.twig';

        return $this->getService('templating')->render($template, array(
              'theme' => $str
        ));
    }

    /**
     * 
     * @return type
     */
    public function highlightInitJsFunction()
    {
        return $this->getService('templating')->render('CodeHighlightBundle:Default:javascripts.html.twig', array());
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return 'code_highlight_extension';
    }

}
