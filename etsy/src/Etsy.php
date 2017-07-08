<?php namespace Dyentite\Etsy;

use Dyentite\Etsy\API\API;

/**
 * Class Etsy
 * @package Dyentite\Etsy
 */
class Etsy extends API
{

    /**
     * Get all currently active listings
     * @return mixed
     */
    public function getMyActiveListings()
    {
        $path = 'shops/' . config('etsy.ETSY_SHOP_NAME') . '/listings/active';

        $response = $this->request($path);

        return $response;
    }


    /**
     * Get all currently active listings
     * @param $keyword
     * @return mixed
     */
    public function getActiveListings($keyword)
    {
        $path = 'listings/active';

        $response = $this->request($path, ['keyword' => $keyword]);

        return $response;
    }


    /**
     * Get all currently active listings
     * @return mixed
     */
    public function getMyDraftListings()
    {
        $path = 'shops/' . config('etsy.ETSY_SHOP_NAME') . '/listings/draft';

        $this->getSetOAuthToken();

        $response = $this->request($path);

        return $response;
    }
}