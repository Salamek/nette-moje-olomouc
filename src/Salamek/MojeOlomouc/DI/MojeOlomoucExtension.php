<?php

namespace Salamek\MojeOlomouc\DI;

use Nette;


/**
 * Class MojeOlomoucExtension
 * @package Salamek\MojeOlomouc\DI
 */
class MojeOlomoucExtension extends Nette\DI\CompilerExtension
{

    /**
     * {@inheritdoc}
     */
    public function loadConfiguration()
    {
        $config = $this->getConfig();
        $builder = $this->getContainerBuilder();


        $builder->addDefinition($this->prefix('mojeOlomouc'))
            ->setType('Salamek\MojeOlomouc\NetteMojeOlomouc')
            ->setArguments([$config['apiKey'], $config['isProduction'], $config['hydrationTable'], $config['appendDefaultHydrationTable']]);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig(array $defaults = [], $expand = true)
    {
        $defaults = [
            'apiKey' => null,
            'isProduction' => false,
            'hydrationTable' => [],
            'appendDefaultHydrationTable' => true
        ];

        return parent::getConfig($defaults, $expand);
    }
}
