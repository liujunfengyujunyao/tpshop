<?php
/**
 * 百度地图插件API
 * 用于获取用户地址,线下工厂店/自提点地址,计算距离等
 * @author: Ly
 * Date: 17/8/14
 * Time: 下午5:52
 */
use think\Model;
use think\Request;

class baidumap extends Model{

    protected $ak;
    public $url;
    public $return_url ;
    public $distance_url;

    public function __construct()
    {
        $this->ak = '4HYBM5T6iQDR5tc66ls0uytoiiexDPrz';  //百度地图API密钥
        $this->url =  'http://api.map.baidu.com/geocoder/v2/';  //百度地图请求地址
        $this->distance_url = 'http://api.map.baidu.com/routematrix/v2/';

    }

    /**
     * 根据地点名称查询经纬度
     * @param   string  $address
     * @param   string  $action
     * @return  array    $res
     */
    public function getGeocoding($address){
        $url = $this->url."?&output=json&address=" .$address ."&ak=". $this->ak;
        $respon = $this->respon($url);
        if($respon['status'] == 0)
            return $respon['result']['location'];
        else{
            exit;
        }
    }

    /**
     * 批量计算两点之间的距离
     * @params array $orgin  起始点
     * @params array $destination    终点
     * @return  array $distance
     */
    public function distance($origin,$destination){
        $origins = '';
        foreach ($origin as $os){
            asort($os);
            $tmp = implode(',',$os).'|';
            $origins .= $tmp;
        }
        $origins = rtrim($origins,'|');   //去除最后一位|;
        $destinations = '';
        foreach ($destination as $ds){
            asort($ds);
            $tmp = implode(',',$ds).'|';
            $destinations .= $tmp;
        }
        $destinations = rtrim($destinations,'|');   //去除最后一位|;
        $url = $this->distance_url."driving?output=json&origins=".$origins."&destinations=".$destinations."&ak=" .$this->ak;
        $distance = $this->respon($url);
        if($distance['status'] ==0){
            foreach($distance['result'] as $res){
                $distances[] = $res['distance']['text'];
            }
            return $distances;
        }else{
            exit;
        }

    }
    /**
     * 单个计算两点之间的距离
     * @params array $orgin  起始点
     * @params array $destination    终点
     * @return  array $distance
     */
    public function getDistance($origin,$destination){
        asort($origin);
        asort($destination);
        $origins = implode(',',$origin);
        $destinations = implode(',',$destination);
        $url = $this->distance_url."walking?output=json&origins=".$origins."&destinations=".$destinations."&ak=" .$this->ak;
        $distance = $this->respon($url);
        if($distance['status'] == 0){
            return $distance['result'][0]['distance'];
        }else{
            exit;
        }
    }

    /**
     * 获取返回数据
     * @param url   url
     * @return array   $res
     */
    public function respon($url){
        $respon = file_get_contents($url);
        $res = json_decode($respon,true);
        return $res;
    }
}