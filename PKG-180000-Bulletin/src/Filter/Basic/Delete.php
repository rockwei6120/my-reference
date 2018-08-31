<?php

namespace Bex\Bulletin\Filter\Basic;

use Bex\Initial\Filter;
use Bex\Permission\Constant AS PermissionConst;

class Delete extends Filter\Basic
{
    public function __construct()
    {
        $this->type = $this->include;
        $this->restful = $this->delete;
        $this->route = 'bulletin/basic/lists';
        $this->crud = [PermissionConst\Crud::DELETE];
    }
}