<?php

namespace Bex\Bulletin\Controller;

use Bex\Bulletin\Service\Basic AS Service;

use Bex\Util\Library AS BexUtil;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Basic
{
    private $service;
    private $return_tool;

    function __construct()
    {
        $this->return_tool = \App::make(BexUtil\ReturnTool::class);
    }

    public function lists()
    {

        try {
            $this->service = \App::make(Service\Lists::class);
            $result = $this->service->get(\Request::all());

            return $this->return_tool->setProperty(0, $result, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }

    public function create()
    {


        try {
            $this->service = \App::make(Service\Create::class);
            $result = $this->service->action(\Request::all());

            return $this->return_tool->setProperty(0, true, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }

    public function info()
    {
        $this->service = \App::make(Service\Info::class);

        try {
            $result = $this->service->get(\Request::all());

            return $this->return_tool->setProperty(0, $result, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }

    public function modify()
    {
        $this->service = \App::make(Service\Modify::class);

        try {
            $result = $this->service->action(\Request::all());

            return $this->return_tool->setProperty(0, true, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }

    public function doModify()
    {
        $this->service = \App::make(Service\Modify::class);

        try {
            $result = $this->service->action(\Request::all());

            return $this->return_tool->setProperty(0, true, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }

    public function delete()
    {
        $this->service = \App::make(Service\Delete::class);

        try {
            $result = $this->service->action(\Request::all());

            return $this->return_tool->setProperty(0, true, __FILE__, __LINE__)->client();
        } catch (\Exception $e) {
            return $this->return_tool->setProperty($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine())->setException(true)->client();
        }
    }




}