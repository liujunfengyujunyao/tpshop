<?php
/**
 * Created by Ly
 * 后台风尚美人柜管理模块
 * User: Ly
 * Date: 17/7/15
 * Time: 下午4:31
 */
namespace app\admin\controller;

use app\common\logic\JssdkLogic;
use think\Page;
use think\AjaxPage;
use think\Db;


class Sark extends Base{

    public function index(){
        return $this->fetch();
    }

    //数据列表,筛选列表
    public function ajaxSarkList()
    {
        $key_word = I('post.key_word');
        $sark_where = array();
        if(!empty($key_word)){
            $sark_where['s.sark_code'] = array('like',"%$key_word%");
        }

        $count = DB::name('sark')->alias('s')->where($sark_where)->count();
        $Page = new AjaxPage($count,10);
        $show = $Page->show();

        $SarkList = DB::name('sark')->alias('s')
                    ->field('s.id,s.sark_code,s.addtime,s.confirm_time,s.wx_image,s.sp_image,r.store_name')
                    ->join('__STORE__ r','s.store_id = r.store_id','LEFT')
                    ->where($sark_where)->order('s.id desc')
                    ->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($SarkList as $sark){
            $sark['addtime'] = date("Y-m-d",$sark['addtime']);
            if(!empty($sark['confirm_time'])){
                $sark['confirm_time'] = date("Y-m-d",$sark['confirm_time']);
            }
            $sarklist[] = $sark;
        }
        $this->assign('sarkList',$sarklist);
        $this->assign('page', $show);
        $this->assign('pager',$Page);
        return $this->fetch();
    }

    //添加风尚美人柜
    public function sark_info(){
        if(IS_POST){
            $data = I('post.');
            if(empty($data['id'])){
                $data['addtime'] = time();
                $res = M('sark')->add($data);
            }else{
                $res = M('sark')->where(array('id' => $data['id']))->save($data);
            }
            if($res !== false){
                $this->ajaxReturn(['status' => 1, 'msg' => '风尚美人柜编辑成功','result' => '']);
            }else{
                $this->ajaxReturn(['status' => 0, 'msg' => '风尚美人柜编辑失败', 'result' => '']);
            }
        }
        //生成随即6位柜子识别码
        $sark['sark_code'] = $this->Random();
        //编辑查询信息
        $id = I('get.id/d');
        if($id){
            $sark = M('sark')->where(array('id' => $id))->find();
            $this->assign('sark',$sark);
        }
        //查询工厂店信息
        $stores = M('store')->field('store_id,store_name')->select();

        $this->assign('sark',$sark);
        $this->assign('stores',$stores);
        return $this->fetch();
    }

    //风尚美人柜删除
    public function del(){
        $id = I('get.id/d');
        $res = M('sark')->where(array('id' => $id))->delete();
        if (!$res){
            $this->ajaxReturn(['status' => 0, 'msg' => '删除失败!']);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '操作成功!']);
    }
    //生成随机不重复的6位字符串
    public function Random(){
        //$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charid = strtoupper(md5(uniqid(rand(),true)));
        $res = substr($charid,0,4).substr($charid,4,1).substr($charid,20,1);
        return $res;
    }

    //生成二维码
    public function getQRcode(){
        $code = I('get.code');
        $path =ROOT_PATH.'public/upload/qrcode/';
        $filename = $path ."{$code}_register.jpg";
        !file_exists($path) && mkdir($path, 0777, true);

        //微信公众号带参数二维码
        $config = M('wx_user')->find();
        $Wechat = new JssdkLogic($config['appid'],$config['appsecret']);
        //永久带参数二维码(公众号)
        $qrcode = "{\"action_name\": \"QR_LIMIT_STR_SCENE\", \"action_info\": {\"scene\": {\"scene_str\": \"$code\"}}}";

        $qrcode_url = $Wechat->get_qrcode($qrcode);
        $imageInfo = file_get_contents($qrcode_url);
        $res_register = file_put_contents($filename,$imageInfo);

        //网页授权登录
        vendor('phpqrcode.phpqrcode');
        vendor('topthink.think-image.src.img');
        $url_login = "http://".$_SERVER['HTTP_HOST']."/Mobile/index/index?sarkcode=" .$code;
        $filename_login = $path ."{$code}_login.png";
        $res_login = \QRcode::png($url_login, $filename_login ,QR_ECLEVEL_H,10,3);

        //图片路径插入数据库
        if($res_register){
            $data['wx_image'] = "upload/qrcode/{$code}_register.jpg";
            $data['sp_image'] = "upload/qrcode/{$code}_login.png";
            $result = M('sark')->where('sark_code',$code)->save($data);
        }
        if($result){
            return $this->fetch('index');
        }else{
            return $this->error('生成失败!');
        }
    }

    //查看打印二维码
    public function printImg(){
        $id = I('get.id/d');
        $img = M('sark')->field('wx_image,sp_image')->where('id',$id)->find();
        $this->assign('img',$img);
        return $this->fetch();
    }

}