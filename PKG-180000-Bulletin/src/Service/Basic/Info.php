<?php

namespace Bex\Bulletin\Service\Basic;

use Bex\Bulletin\Interfaze\Service\Basic;
use Bex\Bulletin\Repository AS BulletinRepo;

/**
 * 站台資訊
 * @package Bex\Bulletin\Service\Setting
 */
class Info implements Basic\Info
{
    protected $bulletin_repo;

    function __construct()
    {
        $this->bulletin_repo = \App::make(BulletinRepo\Basic::class);
    }

    public function get(array $request):object
    {
        //dd($this->bulletin_repo->getAllPublishes($request));
        $bulletin=$this->bulletin_repo->getAllPublishes($request);
        //echo __LINE__;exit;
        return $bulletin;
    }
}