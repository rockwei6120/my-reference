<?php

namespace Bex\Bulletin\Repository;

use Bex\Bulletin\Model AS BulletinModel;

class Basic
{
    private $bulletin_model;

    function __construct()
    {
        $this->bulletin_model = \App::make(BulletinModel\Bulletin::class);
    }

    //新增公告
    public function insert($insert_data): int
    {
        return $this->bulletin_model->create($insert_data)->p17_bin_id;
    }

    //更新指定公告
    public function update(array $udpate_data, $p17_bin_id): void
    {
        foreach ($udpate_data AS $key => $value) {
           $this->bulletin_model->where('p17_bin_id', $p17_bin_id)->update([$key => $value]);
        }
    }

    //刪除指定公告
    public function delete($p17_bin_id):void
    {
        $this->bulletin_model->where('p17_bin_id', $p17_bin_id)->delete();
    }

    //列出指定公告
    public function getThePublish(array $query_data)
    {
        foreach ($query_data AS $key => $value) {
            $get_bulletin=$this->bulletin_model->where($key, $value)->get();
        }
        return $get_bulletin;
    }

    public function getByP17BinId(int $p17_bin_id): ?object
    {
        return $this->bulletin_model
            ->find($p17_bin_id);

    }

    //取得所有公告的內容及資訊
    public function getAllPublishes()
    {
        return \DB::table('p17_bulletin')->get();
    }
}