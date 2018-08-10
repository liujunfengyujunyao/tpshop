<?php
namespace app\mobile\controller;
use app\common\util\WechatUtil;
use think\Db;
use think\Controller;
class SkinReport extends Controller{
	public function index(){
		//获取测肤报告详情
		$url = 'http://54.64.191.2/EZM_Work/web_api/GetRecordDetail.php';
		$data = ['index' => $_GET['id']];
		$return = httpRequest($url,'POST',$data);
        $return = json_decode($return,1);
        if($return['success'] == 1){
        	switch ($return['type']) {
        		case '1':
        			$return['type'] = '皮肤油分';
        			break;
    			case '2':
    				$return['type'] = '肌肤铅汞值';
    				break;
    			case '3':
    				$return['type'] = '胶原蛋白纤维';
    				break;
    			case '4':
    				$return['type'] = '肌肤弹性';
    				break;
        		default:
        			$return['type'] = '水分含量';
        			break;
        	}
            //时间差调整
            //$time = date('Y-m-d H:i:s',strtotime("$return[created] +8 hour"));
        	$this->assign('type',$return['type']);
        	$this->assign('value',$return['value']);
        	$this->assign('time',$return['created']);
        	$this->assign('products',$return['products']);
        	//var_dump($return);die;
        }
        	return $this->fetch();
	}
}