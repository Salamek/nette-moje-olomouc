<?php

namespace Salamek\MojeOlomouc\DI;

use Nette;
use Nette\DI\Compiler;
use Nette\DI\Configurator;

/**
 * Class MojeOlomoucExtension
 * @package Salamek\MojeOlomouc\DI
 */
class MojeOlomoucExtension extends Nette\DI\CompilerExtension
{

    public function loadConfiguration()
    {
        $config = $this->getConfig();
        $builder = $this->getContainerBuilder();


        $builder->addDefinition($this->prefix('mojeOlomouc'))
            ->setClass('Salamek\MojeOlomouc\MojeOlomouc');
    }


    /**
     * @param Configurator $config
     * @param string $extensionName
     */
    public static function register(Configurator $config, $extensionName = 'mojeOlomouc')
    {
        $config->onCompile[] = function (Configurator $config, Compiler $compiler) use ($extensionName) {
            $compiler->addExtension($extensionName, new GitlabExtension());
        };
    }


    /**
     * {@inheritdoc}
     */
    public function getConfig(array $defaults = [], $expand = true)
    {
        $defaults = [
            'apiKey' => null,
            'isProduction' => false
        ];

        return parent::getConfig($defaults, $expand);
    }
}
