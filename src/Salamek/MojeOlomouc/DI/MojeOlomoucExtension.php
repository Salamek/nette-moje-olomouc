<?php

namespace Salamek\MojeOlomouc\DI;

use Nette;
use Salamek\MojeOlomouc\Model\IArticleCategory;
use Salamek\MojeOlomouc\Model\ArticleCategory;
use Salamek\MojeOlomouc\Model\IArticle;
use Salamek\MojeOlomouc\Model\Article;
use Salamek\MojeOlomouc\Model\IEventCategory;
use Salamek\MojeOlomouc\Model\EventCategory;
use Salamek\MojeOlomouc\Model\IEvent;
use Salamek\MojeOlomouc\Model\Event;
use Salamek\MojeOlomouc\Model\IImportantMessage;
use Salamek\MojeOlomouc\Model\ImportantMessage;
use Salamek\MojeOlomouc\Model\IPlaceCategory;
use Salamek\MojeOlomouc\Model\PlaceCategory;
use Salamek\MojeOlomouc\Model\IPlace;
use Salamek\MojeOlomouc\Model\Place;


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
            ->setArguments([$config['apiKey'], $config['isProduction'], $config['hydrationTable']]);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig(array $defaults = [], $expand = true)
    {
        $defaults = [
            'apiKey' => null,
            'isProduction' => false,
            'hydrationTable' => [
                IArticleCategory::class => ArticleCategory::class,
                IArticle::class => Article::class,
                IEventCategory::class => EventCategory::class,
                IEvent::class => Event::class,
                IImportantMessage::class => ImportantMessage::class,
                IPlaceCategory::class => PlaceCategory::class,
                IPlace::class => Place::class
            ]
        ];

        return parent::getConfig($defaults, $expand);
    }
}
