<?php

namespace TopItems\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;

class ContentController extends Controller
{
    public function showTopItems(Twig $twig, ItemDataLayerRepositoryContract $itemRepository):string
    {
        $itemColumns = [
            'itemDescription' => [
                'name1',
                'description'
            ],
            'variationBase' => [
                'id'
            ],
            'variationRetailPrice' => [
                'price'
            ],
            'variationImageList' => [
                'path',
                'cleanImageName'
            ]
        ];

        $itemFilter = [
            'itemBase.isStoreSpecial' => [
                'shopAction' => [3]
            ]
        ];

        $itemParams = [
            'language' => 'en'
        ];

        $resultItems = $itemRepository
            ->search($itemColumns, $itemFilter, $itemParams);

        $items = array();
        foreach ($resultItems as $item)
        {
            $items[] = $item;
        }
        $templateData = array(
            'resultCount' => $resultItems->count(),
            'currentItems' => $items
        );

        return $twig->render('TopItems::content.TopItems', $templateData);
    }

    public function sayHello(Twig $twig):string
    {
        return $twig->render('TopItems::content.TestHellow');
    }

    public function displayArray():array
    {
        return [1 => 'a', 2 => 'b', 3 => 'c'];
    }


}
