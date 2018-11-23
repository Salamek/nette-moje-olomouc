<?php

namespace Salamek\MojeOlomouc;

use GuzzleHttp\Client;
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
 * Class NetteMojeOlomouc
 * @package Salamek\MojeOlomouc
 */
class NetteMojeOlomouc extends MojeOlomouc
{
    /**
     * NetteMojeOlomouc constructor.
     * @param string $apiKey
     * @param bool $isProduction
     * @param array $hydrationTable
     */
    public function __construct(string $apiKey, bool $isProduction = false, array $hydrationTable = [
        IArticleCategory::class => ArticleCategory::class,
        IArticle::class => Article::class,
        IEventCategory::class => EventCategory::class,
        IEvent::class => Event::class,
        IImportantMessage::class => ImportantMessage::class,
        IPlaceCategory::class => PlaceCategory::class,
        IPlace::class => Place::class
    ])
    {
        $guzzleHttpConfig = [
            'base_uri' => ($isProduction ? 'https://app.olomouc.eu': 'https://www.olomouc.app')
        ];

        parent::__construct(new Client($guzzleHttpConfig), $apiKey, $hydrationTable);
    }
}