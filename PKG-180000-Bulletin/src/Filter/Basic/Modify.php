<?php

namespace Bex\Bulletin\Filter\Basic;

use Bex\Initial\Filter;
use Bex\Permission\Constant AS PermissionConst;

class Modify extends Filter\Basic
{
    public function __construct()
    {
        $this->type = $this->include;
        $this->restful = $this->put;
        $this->route = 'bulletin/basic/lists';
        $this->crud = [PermissionConst\Crud::UPDATE];
    }
}