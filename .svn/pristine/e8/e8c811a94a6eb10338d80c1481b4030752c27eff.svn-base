<?php
/**
 * 地图交互,获取返回值
 * @author: Ly
 * Date: 17/8/15
 * Time: 上午11:00
 */
namespace app\home\controller;

class MapApi extends Base{
    public $config;
    private $oauth;
    public $class_obj;

    public function __construct($oauth)
    {
        parent::__construct();
        $this->oauth = $oauth;
        include_once "plugins/map/{$this->oauth}/{$this->oauth}map.class.php";
        $class = '\\' . $this->oauth . 'map';
        $this->class_obj = new $class();
    }

    //查询某个地点的经纬度
    public function getGeocoding($address) {
        if (!$this->oauth) {
            $this->error('非法操作!');
        }
        return ($this->class_obj->getGeocoding($address));
    }

    //批量查询两点间距离
    public function distance($orgin,$destination){
        if (!$this->oauth){
            $this->error('非法操作!');
        }
        return ($this->class_obj->distance($orgin,$destination));
    }

    //单独计算两点间距离
    public function getDistance($origin,$destination){
        if(!$this->oauth){
            $this->error('非法操作!');
        }
        return ($this->class_obj->getDistance($origin,$destination));
    }
}