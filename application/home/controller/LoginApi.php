<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * 微信交互类
 */
namespace app\home\controller;
use app\common\logic\UsersLogic;
use app\common\logic\CartLogic;
class LoginApi extends Base {
    public $config;
    public $oauth;
    public $class_obj;

    public function __construct(){
        parent::__construct();
	session('?user');
        
        $this->oauth = I('get.oauth');
        //获取配置
        $data = M('Plugin')->where("code",$this->oauth)->where("type","login")->find();
        $this->config = unserialize($data['config_value']); // 配置反序列化

        if(!$this->oauth)
            $this->error('非法操作',U('User/login'));
        include_once  "plugins/login/{$this->oauth}/{$this->oauth}.class.php";
        $class = '\\'.$this->oauth; //
        $this->class_obj = new $class($this->config); //实例化对应的登陆插件
    }

    public function login(){
        if(!$this->oauth)
            $this->error('非法操作',U('User/login'));

        include_once  "plugins/login/{$this->oauth}/{$this->oauth}.class.php";
        $this->class_obj->login();
    }

 public function callback()
    {
        $logic = new UsersLogic();
        $data = $this->class_obj->respon();
        var_dump($data);die;
		$data['oauth_child'] = 'open';
        $_SESSION['third_oauth'] = $data;

        //获取用户信息
        if($data['unionid']){
        	$thirdUser = get_user_info($data['unionid'],4,$data['oauth']);
        }else{
        	$thirdUser = get_user_info($data['openid'],3,$data['oauth']);
        }

        if(!$thirdUser){
            //账户不存在 注册一个
			$oauth_user = [
                'openid'    	=> $data['openid'],
                'oauth'     	=> $data['oauth'],
                'reg_time'  	=> time(),
				'oauth_child'	=> $data['oauth_child'],
				'unionid'		=> $data['unionid']
            ];
			$ret = M('oauth_users')->insert($oauth_user);
			if($ret){
				if($data['unionid']){
					$thirdUser = get_user_info($data['unionid'],4,$data['oauth']);
				}else{
					$thirdUser = get_user_info($data['openid'],3,$data['oauth']);
				}
			}
		}
			
        //如果用户已经登录, 直接绑定
        $user = session("user");
		if(!$user){
			$user['user_id'] = 0;
			$_SESSION['user'] = $user;			
		}
		
        if($user['user_id'] > 0 && $thirdUser['is_bind'] == 0){
            $res = $logic->oauth_bind_new($user);
            if($res['status'] == 1){
                return $this->success("绑定成功", U('Home/User/bind_auth'));
            }else{
                return $this->error("绑定失败,失败原因:".$res['msg'] , U('Home/User/bind_auth'));
            }
        }
        
        if(!$thirdUser['user_id']){
            //用户未关联账号, 跳到关联账号页
            return $this->redirect(U('User/bind_guide'));
        }else{
            //已关联账号就直接登录
            $data = $logic->thirdLogin($data);
            if ($data['status'] != 1){
                $this->error($data['msg']);
            }
			
			$user_id = $data['result']['user_id'];
            setcookie('user_id', $user_id, null, '/');
            setcookie('is_distribut', $data['result']['is_distribut'], null, '/');
            //$nickname = empty($data['result']['nickname']) ? $_SESSION['third_oauth']['nickname'] : $data['result']['nickname'];
			$user = M('Users')->where(array('user_id'=>$user_id))->find();
			$_SESSION['user'] = $user;
            setcookie('uname', urlencode($user['nickname']), null, '/');
            setcookie('cn', 0, time() - 3600, '/');
            // 登录后将购物车的商品的 user_id 改为当前登录的id
            M('cart')->where("session_id", $this->session_id)->save(array('user_id' => $data['result']['user_id']));
        
            $cartLogic = new CartLogic();
            $cartLogic->doUserLoginHandle($this->session_id, $data['result']['user_id']);  //用户登录后 需要对购物车 一些操作
            $referurl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : U("Home/User/index");
            if (isMobile()){
                $this->success('登陆成功', U('Home/index/index'));
            }else{
                $this->success('登陆成功', U('Home/index/index'));
            }
        }
     
        
    }
}