<?php
namespace Mobile\Controller;
use Think\Controller;
use Think\Verify;
header("Content-Type: text/html;charset=utf-8"); 
class PublicController extends Controller {
	public function gongyou(){
		//导航一级栏读取
			$report=M('report_categories');
			$arr=$report->where('type_id=0 and web=1 and ixm=1')->order('id asc')->select();
			
			// echo '<pre>';
			// print_r($arr);echo '<pre>';die;
			// print_r($arrs);die;
			$this->assign('nav',$arr);
			

			$banner=M("Banner");//轮播
			$ban=$banner->where('web=2')->select();
			$this->assign('ban',$ban);
			

			$emph=M('Emph');
			$em=$emph->find();
			$this->assign('em',$em);
		 
	}
	/*商城导航*/
	public function mgation(){
		//导航一级栏读取
			$report=M('report_categories');
			$djdh=$report->where('type_id=0 and web=2')->limit(6)->order('id asc')->select();//顶级导航

			$arr=$report->where('type_id=0 and web=2 and ix=2')->limit(6)->order('id asc')->select();//左侧顶级导航
			$arrs=$report->where('type_id!=0 and web=2')->order('id asc')->select();//读取非顶级栏
			foreach ($arr as $k => $v) {//一级导航
				foreach ($arrs as $key => $value) {
					if($arr[$k]['id'] == $arrs[$key]['type_id']){
						$arr[$k]['er'][$key]['ername']=$arrs[$key]['type'];
						$arr[$k]['er'][$key]['erid']=$arrs[$key]['id'];
					}
					
				}
				
			}
			
			
			// echo '<pre>';
			// print_r($arr);echo '<pre>';die;
			// print_r($arrs);die;
			$this->assign('djdh',$djdh);
			$this->assign('nav',$arr);
			$this->assign('hh',1);
			$this->assign('hhh',1);

			// $banner=M("Banner");//轮播
			// $ban=$banner->select();
			// $this->assign('ban',$ban);
			
			 
	}
	/*安全退出*/
    public function anquan(){
      //session_destroy();//清除1
      cookie('zjtr_id',null);
      cookie('zjtr_user',null);
      if(empty($_COOKIE['user'])){
        echo $this->jump('您以安全退出！','Mall/index');
      }
       
    }
    /*商城提示*/
    public  function  tishi(){
    	$shopcart=M('Shopcart');
        if($_COOKIE['zjtr_id']){
            $up['cook']=$_COOKIE['PHPSESSID'];
            $zhuan=$shopcart->where($up)->select();
            foreach ($zhuan as $key => $value) {
               $member['l_id']=$_COOKIE['zjtr_id'];//加入购物车的人
               $add=$shopcart->where('sid='.$value['sid'])->save($member);
            }
            //print_r($zhuan);
            $map['l_id']=$_COOKIE['zjtr_id'];
        }else{
            $map['l_id']=0;
            $map['cook']=$_COOKIE['PHPSESSID'];
        }
      $num=$shopcart->where($map)->count();
      $this->assign('tishi',$num);
    }
	/*
    多个文件上传
    */
  public function uploads($data){
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     10485760 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Public/'; // 设置附件上传根目录
      // 上传单个文件 
      //$info   =   $upload->uploadOne($data);
       $info   =   $upload->upload();
      if(!$info) {// 上传错误提示错误信息
        return false;
          //return  $upload->getError();
      }else{// 上传成功 获取上传文件信息
         // return $info['savepath'].$info['savename'];
      	//获取上传文件信息
      	

      		 foreach ($info as $key => $file){
                $image[$key] = $file['savepath'].$file['savename'];
                $size[$key] = $file['size'];
                $dir[$key]=  $file['savepath'];
                $filename[$key]=$file['savename'];
            }
             $cou=count($image);
            for ($i=0; $i <$cou ; $i++) { 
            	//图片物理目录删除、改名图片用
	            $path= './Public/'.$dir[$i];
	            $img =new \Think\Image();//实例化
	            $img->open($path.$filename[$i]);//打开物理图片
	           //使用thumb方法生成缩略图并改名为：som_.$filename此时在项目根目录上
	            $img->thumb(1000,1000)->save(HX_.$filename[$i]);
	             //重新赋值方便处理
	            $oldfile=HX_.$filename[$i];
	            //rename()更改成新的文件名，此时还在项目根目录上
	            rename($oldfile, new_.$filename[$i]);
	            //重新赋值方便处理 new_.$filename为更名后新文件名
	            $newfile=new_.$filename[$i];
	            //移动新文件到物理$path 目录最终生缩略图文件为：new_xxxx.jpg(后缀名不作更改只是在前加了new_)
	            rename($newfile,"$path/$newfile" );
	             //$thumb获取缩略图的地址和文件名用于写放数据库用
	            $thumb[$i]=$file['savepath'].$newfile;
	            unlink($path."/".$filename[$i]);//删除图片
	            //写入到数据库中，下面date,pic,th
            }
            
      	
            //print_r($thumb);
            $thumb=implode(',',$thumb);
            return $thumb;
      }
  }
	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

    /*跳转*/
    public  function gwctz(){
      // $url=C('HOME_PATH').'/Mall/cart';
    	echo '<div style="width:20%;margin:0 auto;margin-top:30%"><img src="http://localhost/zjtr/Public/images/loading.gif" style="width:100%;"></div>';
       return "<script language='javascript' type='text/javascript'>location.replace(document.referrer);</script>";
      // return "<script language='javascript' type='text/javascript'>if(confirm('是否前往购物车？')){window.location.href='".$url."';}else{location.replace(document.referrer);}</script>";
    }
	
	
}