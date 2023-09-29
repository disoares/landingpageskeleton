<?php

namespace App\model;

use Rain\Tpl;

class LoadTpl
{

    private $tpl;
    private $options = [];
    private $defaults = [
        "header" => false,
        "footer" => false,
        "data" => []
    ];

    public function __construct($page, $opts = array())
    {
        $this->options = array_merge($this->defaults, $opts);

        $config = array(
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views/",
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views-cache/",
            "debug"         => false, // set to false to improve the speed
        );
        Tpl::configure($config);

        $this->tpl = new Tpl;

        $this->setData($this->options['data']);

        if ($this->options['header']) $this->tpl->draw("header");
        $this->tpl->draw($page);
    }

    private function setData($data = array())
    {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function __destruct()
    {
        if ($this->options['header']) $this->tpl->draw("footer");
    }
}
