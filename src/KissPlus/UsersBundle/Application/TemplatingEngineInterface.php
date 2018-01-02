<?php
namespace KissPlus\UsersBundle\Application;

interface TemplatingEngineInterface
{
    public function render(string $name, \ArrayObject $parameters = null) : string;
}
