<?php

namespace Bex\Bulletin\Service\Basic;

trait Validation
{
    private $rules;

    private function initValid()
    {
        $this->rules = [

            'p17_bin_title' => 'required|min:2'
            , 'p17_bin_content'   => 'required|max:200'
            , 'p17_bin_memo'   => 'max:200'

        ];
    }

    private function setRules($key, $val)
    {
        $this->rules[$key] = $val;
    }

    private function unsetRules($key)
    {
        unset($this->rules[$key]);
    }

    public function valid(array $request)
    {
        $validator = \Validator::make($request, $this->rules);

        if ($validator->fails()) {
            throw new \Exception(($validator->messages()), 20001);
        }
    }

}