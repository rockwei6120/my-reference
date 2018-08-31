<?php
/**
 * Created by PhpStorm.
 * User: bexpc
 * Date: 2018/8/20
 * Time: 上午 11:56
 */
namespace Bex\Bulletin\Seeder\Node;

use Illuminate\Database\Seeder;
use Bex\Node\Library AS NodeLibarary;
use Bex\Account\Repository AS AccountRepo;
use Bex\Branch\Repository AS BranchRepo;
use Bex\Permission\Constant\Crud;
use Bex\Branch\Constant\Role;
use Bex\Branch\Constant AS BranchConst;

class BulletinBasic extends Seeder
{
    private $bulider_lib;

    private $branch_repo;
    private $branch_role_repo;

    function __construct()
    {
        $this->bulider_lib = \App::make(NodeLibarary\Builder::class);
        $this->branch_repo = \App::make(BranchRepo\Basic::class);
        $this->branch_role_repo = \App::make(BranchRepo\Role::class);
    }

    public function run()
    {
        /* 取得BEX站台 */
         $bex = $this->branch_repo->getBranchByP3BchCode(BranchConst\Branch::MASTERBRANCH);
        /* END 取得BEX站台 */
         $admin_role = null;
        if ($bex) {
        /* 取得ADMIN角色 */
         $admin_role = $this->branch_role_repo->getRoleByP3BreSpecificP3BchId(Role::ADMIN, $bex->p3_bch_id);
        /* END 取得ADMIN角色 */
        }

        $push = [
            [
                'p4_node_name' => '系統設定'
                , 'p4_node_route' => null
                , 'p4_node_memo' => null
                , 'p3_brn_crud' => Crud::READ
                , 'p4_node_development' => '系統設定'
                , 'sub' =>
                    [
                        [
                            'p4_node_name' => '公佈欄管理'
                            , 'p4_node_route' => null
                            , 'p4_node_memo' => null
                            , 'p3_brn_crud' => Crud::READ
                            , 'p4_node_development' => '系統設定 > 公佈欄管理'
                            , 'sub' =>
                                [
                                    [
                                        'p4_node_name' => '公佈欄設定'
                                        , 'p4_node_route' => 'bulletin/basic/lists'
                                        , 'p4_node_memo' => '此節點可設定所有公佈欄'
                                        , 'p3_brn_crud' => (Crud::CREATE + Crud::DELETE + Crud::READ + Crud::UPDATE)
                                        , 'p4_node_development' => '系統設定 > 公佈欄管理 > 發布公告'
                                    ]

                                ]
                        ]
                    ]
            ]
        ];
        if ($bex && $admin_role) {
             $assign_permission = [
                 'assign_permission_p3_bch_id' => $bex->p3_bch_id
                 , 'assign_permission_p3_bre_id' => $admin_role->p3_bre_id
             ];
             $this->bulider_lib->setAssignPermissionProperty($assign_permission);
         }

        $this->bulider_lib->push($push, null);
    }
}