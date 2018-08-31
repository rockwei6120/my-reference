<?php

namespace Bex\Bulletin\Service\Basic;

use Bex\Bulletin\Interaze\Service\Basic;
use Bex\Bulletin\Repository AS BulletinRepo;
use Bex\Account\Repository AS AccountRepo;
use  Illuminate\Support\Str;
use Bex\Initial\Library\Environment;
use Carbon\Carbon;


class Create implements Basic\Create
{
    use Validation;
    protected $env_config_lib;
    private $bulletin_repo;

    function __construct()
    {
        $this->env_config_lib = \App::make(Environment\Config::class);
        $this->bulletin_repo = \App::make(BulletinRepo\Basic::class);
        $this->initValid();
    }


    public function action(array $request):void
    {

        try {

            dd($this->env_config_lib->getGlobal('p5_account'));
            $this->valid($request);
            /* 新增公告 */
            $insert_data = [
                 'p17_bin_publish_date' => Carbon::now()
                , 'p17_bin_title'     => $request['p17_bin_title']
                , 'p17_bin_content'     => $request['p17_bin_content']
                , 'p17_bin_memo'     => $request['p17_bin_memo'] ?? null
            ];

            $this->bulletin_repo->insert($insert_data);
            /* END 新增公告 */

        } catch (\Exception $e) {
            throw $e;
        }
    }
}