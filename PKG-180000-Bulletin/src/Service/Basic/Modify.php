<?php

namespace Bex\Bulletin\Service\Basic;

use Bex\Bulletin\Interfaze\Service\Basic;
use Bex\Bulletin\Repository AS BulletinRepo;

/**
 * 站台資訊
 * @package Bex\Branch\Service\Setting
 */
class Modify implements Basic\Modify
{
    use Validation;
    private $bulletin_repo;

    function __construct()
    {
        $this->bulletin_repo = \App::make(BulletinRepo\Basic::class);
        $this->initValid();
    }

    public function action(array $request):void
    {
        $this->valid($request);
       foreach ($request AS $key => $value) {
          if($key=='p17_bin_id') {
              //echo __LINE__;exit();
              $this->bulletin_repo->update($request, $value);
          }
       }
    }


}