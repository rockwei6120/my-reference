<?php

namespace Bex\Bulletin\Service\Basic;

use Bex\Bulletin\Interfaze\Service\Basic;
use Bex\Bulletin\Repository AS BulletinRepo;
use Bex\Account\Repository AS AccountRepo;

class Delete implements Basic\Delete
{
    private $bulletin_repo;
    private $account_repo;

    function __construct()
    {
        $this->bulletin_repo = \App::make(BulletinRepo\Basic::class);
        $this->account_repo = \App::make(AccountRepo\Basic::class);
    }

    public function action(array $request):void
    {
        foreach ($request AS $key => $value) {
            $this->bulletin_repo->delete($value);
        }
    }
}