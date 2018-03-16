<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 
class NewController extends Controller {
	 /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
	public function index(){
    	if($_SESSION['id']=='')
    	{
    	echo	$this->jump('请登录',"Index/login");
    	}else {
			
    		$this->display();
    	}
    }

	public function news(){
		$news=M('new_x');
		$count=$news->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		if(!empty($_POST['sub'])){
	 		$map['title']=array("like","%".$_POST['name']."%");	 
		}

		$arr=$news->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($arr as $key => $value) {
			$arr[$key]['diagram']=explode(',',$arr[$key]['diagram']);
		}
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function news_add(){
		if(!empty($_POST['sub'])){
			$news=M('new_x');
			$map=$news->create();
			if($_FILES['photo']['tmp_name']){
				 $map['thumbnail']=$this->uploads($_FILES['photo']);
			}
			if($_FILES['img']['tmp_name']){
				$map['diagram']=$this->uploads($_FILES['img']);
			}
			$map['colour']=implode(',',$map['colour']);//将颜色数组转为字符串
			$map['time']=time();
			$query=$news->add($map);
			if($query>0){
			   echo	$this->jump('添加成功','New/news');
			}else{
			   echo	$this->jump('添加失败',"New/news_add");
			}
		}else{
			$rc=M('report_categories');
			$rc_data=$rc->where('web=2 and type_id!=0')->select();
			$this->assign('rc',$rc_data);
			$col=M('Colour');
			$c=$col->select();
			$this->assign('c',$c);
			$this->display();
		}
	}
	//删除数据
	public function news_del()
	{
		if(!empty($_GET['id'])){
			$news=M('new_x');
			$id=$_GET['id'];
			$data=$news->find($id);
			$img=explode(',',$data['diagram']);
			$count=count($img);
			for ($i=0; $i < $count; $i++) { 
				if($_POST['old_img'.$i]){
					$oldimg[$i]=$_POST['old_img'.$i];
				}else{
					unlink("./Public/".$img[$i]."");//删除图片
				}
			}
		 	$val=$news->delete($id);
			if($val>0)
			{
				echo $this->jump("删除成功","New/news");
			}else 
				{
				echo $this->jump("删除失败","New/news");
			}		

		}
	}
	//数据修改
	public function news_mod(){
		$news=M('new_x');
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map=$news->create();
			$data=$news->find($id);
			$img=explode(',',$data['diagram']);
			$count=count($img);
			for ($i=0; $i < $count; $i++) { 
				if($_POST['old_img'.$i]){
					$oldimg[$i]=$_POST['old_img'.$i];
				}else{
					unlink("./Public/".$img[$i]."");//删除图片
				}
			}
			$map['diagram']=implode(',',$oldimg);
            if($_FILES['img']['tmp_name']){
            	if ($map['diagram']!='') {
					$map['diagram']=$map['diagram'].','.$this->uploads($_FILES['img']);
            	}else{
            		$map['diagram']=$this->uploads($_FILES['img']);
            	}
			}
			$map['colour']=implode(',',$map['colour']);//将颜色数组转为字符串
			$map['time']=time();
			$val=$news->where("id=".$id)->save($map);
			if($val){
				echo $this->jump("修改成功","New/news");
			}else {
				echo $this->jump("修改失败","New/news");
			}
		}elseif(!empty($_GET['id'])){
			$col=M('Colour');
			$c=$col->select();
			$this->assign('c',$c);
			$rc=M('report_categories');
			$rc_data=$rc->where('web=2 and type_id!=0')->select();
			$this->assign('rc',$rc_data);
			$id=$_GET['id'];
			$sel=$news->where()->find("$id");
			$sel['diagram']=explode(',',$sel['diagram']);
			$count=count($sel['diagram']);
			for ($i=0; $i < $count; $i++) { 
				$img[$i]['bh']=$i;
				$img[$i]['img']=$sel['diagram'][$i];
			}
			$this->assign('img',$img);
			$this->assign('num',count($sel['diagram'])+1);//当前产品数量
			$this->assign('sel',$sel);//数据
			$this->assign('id',1);
			$this->assign('ids',1);
			$this->display();
		}
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

}