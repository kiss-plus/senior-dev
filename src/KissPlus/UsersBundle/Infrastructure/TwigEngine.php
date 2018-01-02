<?php

namespace KissPlus\UsersBundle\Infrastructure;


use KissPlus\UsersBundle\Application\TemplatingEngineInterface;
use Twig\Environment;

class TwigEngine implements TemplatingEngineInterface
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(string $name, \ArrayObject $parameters = null): string
    {
        if (!$parameters) {
            $parameters = new \ArrayObject();
        }
        return $this->twig->render($name, $parameters->getArrayCopy());
    }
}