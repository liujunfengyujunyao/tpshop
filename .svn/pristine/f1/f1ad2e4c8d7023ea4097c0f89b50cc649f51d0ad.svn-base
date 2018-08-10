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
 * $Author: IT宇宙人 2015-08-10 $
 */
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\AjaxPage;

class Article extends Base {
    
    public function index(){       
        $article_id = I('article_id/d',38);
    	$article = Db::name('article')->where("article_id", $article_id)->find();
    	$this->assign('article',$article);
        return $this->fetch();
    }
 
    /**
     * 文章内列表页
     */
    public function articleList(){
        $article_cat = M('ArticleCat')->where("parent_id  = 0")->select();
        $this->assign('article_cat',$article_cat);
        return $this->fetch();
    }    
    /**
     * 文章内容页
     */
    public function detail(){
    	$article_id = I('article_id/d',1);
    	$article = Db::name('article')->where("article_id", $article_id)->find();
    	if($article){
    		$parent = Db::name('article_cat')->where("cat_id",$article['cat_id'])->find();
    		$this->assign('cat_name',$parent['cat_name']);
    		$this->assign('article',$article);
    	}
        return $this->fetch();
    } 


    /*
     * 新闻列表
     * create DH 2017-12-21
     */
    public function newsList() {
        $news_cat = Db::name('article_cat')->field('cat_id, cat_name')->where(array('parent_id'=>3, 'show_in_nav'=>1))->order('sort_order desc')->select();

        $where['is_close'] = 0;
        $where['start_time'] = array('lt', time());
        $where['end_time'] = array('gt', time());
        $activity = Db::name('prom_goods')->field('name, description, prom_img')->where($where)->order('start_time desc')->limit(7)->select();
        $this->assign('news_cat', $news_cat);
        $this->assign('activity', $activity);
        return $this->fetch('list');
    }

    public function ajax_news_list() {
        $cat_id = I('post.id', 0);

        $where['a.is_open'] = 1;
        if ($cat_id == 0) {
            $where['c.parent_id'] = 3;
        }else {
            $where['a.cat_id'] = $cat_id;
        }

        $count = Db::name('article')->alias('a')->join('article_cat c', 'c.cat_id = a.cat_id', 'left')->where($where)->count();
        $Page = new AjaxPage($count, 10);
        $show = $Page->show();

        $list = Db::name('article')->alias('a')
            ->field('a.article_id, a.title, a.content, a.add_time, a.description, a.link')
            ->join('article_cat c', 'c.cat_id = a.cat_id', 'left')
            ->where($where)->order('a.click desc, a.add_time desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();

        $this->assign('list', $list);
        $this->assign('page',$show);
        return $this->fetch();
    }
}





