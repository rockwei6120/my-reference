<?php

namespace Bex\Bulletin\Service\Basic;

use Bex\Bulletin\Interfaze\Service\Basic;
use Bex\Bulletin\Repository AS BulletinRepo;

/**
 * 站台列表
 * @package Bex\Bulletin\Service\Setting
 */
class Lists implements Basic\Lists
{
    protected $bulletin_repo;

    function __construct()
    {
        $this->bulletin_repo = \App::make(BulletinRepo\Basic::class);
    }

    public function get(array $request=[])
    {
        $bulletin=$this->bulletin_repo->getThePublish($request);

        return $bulletin;
    }

}