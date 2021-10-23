<?php

namespace Salamek\MojeOlomouc\DI;

use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use Salamek\MojeOlomouc\NetteMojeOlomouc;


/**
 * Class MojeOlomoucExtension
 * @package Salamek\MojeOlomouc\DI
 */
class MojeOlomoucExtension extends CompilerExtension
{
    /**
     * {@inheritdoc}
     */
    public function getConfigSchema(): Schema
    {
        return Expect::structure([
            'apiKey' => Expect::string()->required(),
            'isProduction' => Expect::bool()->required(),
            'hydrationTable' => Expect::array()->default([]),
            'appendDefaultHydrationTable' => Expect::bool()->default(true)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function loadConfiguration()
    {
        $config = (array) $this->getConfig();
        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('mojeOlomouc'))
            ->setFactory(NetteMojeOlomouc::class, [$config['apiKey'], $config['isProduction'], $config['hydrationTable'], $config['appendDefaultHydrationTable']]);
    }
}
