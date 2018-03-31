<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class TransferController extends Controller {

	public function transfer(){
		$sid = session('id');
		// var_dump($sid);exit;
		$transfer=M('transfer');
		$count=$transfer->where("flag = 0 and tid=".$sid)->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$transfer->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		// var_dump($arr);exit;
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function transfer_add()
	{	
		// $administration = session('administration');
        // var_dump($administration);exit;
		$bmid = session('department_id');
		// var_dump($bmid);exit;
		$director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
        if(!$director){
            $this->assign('user', $user);
            $this->display();
        }
		// var_dump($director);exit;
		$user_id = array_column($director,'id');
		// var_dump($user_id);exit;
		$a = implode(",",$user_id);
        // var_dump($a);exit;
		// var_dump($a);exit;
        $user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
		// var_dump($user);exit;
		// var_dump($name);die;
		$this->assign('user', $user);
		$this->display();
	}

	public function transfer_doadd(){
		if(!empty($_POST['sub'])){
			$transfer=M("transfer");
			$map['transfer_name']=$_POST['transfer_name'];
			$map['transfer_contract']=$_POST['transfer_contract'];
			$map['transfer_allocation']=$_POST['transfer_allocation'];
			$map['transfer_certificate']=$_POST['transfer_certificate'];
			$map['transfer_configuration']=$_POST['transfer_configuration'];
			$map['transfer_talent']=$_POST['transfer_talent'];
			$map['transfer_match']=$_POST['transfer_match'];
			$map['transfer_huming']=$_POST['transfer_huming'];
			$map['transfer_amount']=$_POST['transfer_amount'];
			$map['transfer_bank']=$_POST['transfer_bank'];
			$map['transfer_account']=$_POST['transfer_account'];
			$map['transfer_note']=$_POST['transfer_note'];
			$map['transfer_paid']=$_POST['transfer_paid'];
			$map['transfer_pic']=$_POST['transfer_pic'];
			$map['transfer_information']=$_POST['transfer_information'];
			$map['status']=$_POST['status'];
            $map['zid']=$_POST['zid'];
            $map['tid']=$_POST['tid'];
			// var_dump($map['tid']);exit;
			$map=$transfer->create();
			if($_FILES['transfer_pic']['tmp_name']){
				$map['transfer_pic']=$this->upload($_FILES['transfer_pic']);
			}
			$query=$transfer->add($map);
			if($query>0){
                $this->journals($_SESSION['name'],'申请了转账',$_POST['transfer_name']);
				echo $this->jump('添加成功','Transfer/transfer');
			}
			else{
				echo $this->jump('添加失败','Transfer/transfer_add');
			}
		}
		else{
		$this->display();
		}
	}

	/*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

    public function transfer_mod()
	{	
        $transfer=M("transfer");
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['transfer_name']=$_POST['transfer_name'];
			$map['transfer_contract']=$_POST['transfer_contract'];
			$map['transfer_allocation']=$_POST['transfer_allocation'];
			$map['transfer_certificate']=$_POST['transfer_certificate'];
			$map['transfer_configuration']=$_POST['transfer_configuration'];
			$map['transfer_talent']=$_POST['transfer_talent'];
			$map['transfer_match']=$_POST['transfer_match'];
			$map['transfer_huming']=$_POST['transfer_huming'];
			$map['transfer_amount']=$_POST['transfer_amount'];
			$map['transfer_bank']=$_POST['transfer_bank'];
			$map['transfer_account']=$_POST['transfer_account'];
			$map['transfer_note']=$_POST['transfer_note'];
			$map['transfer_paid']=$_POST['transfer_paid'];
			$map['transfer_pic']=$_FILES['transfer_pic'];
			$map['transfer_information']=$_POST['transfer_information'];
            $map['status']=$_POST['status'];
            $map['zid']=$_POST['zid'];
			if($_FILES['transfer_pic']['tmp_name']){
				$map['transfer_pic']=$this->upload($_FILES['transfer_pic']);
			}
			
			$val=$transfer->where("id=".$id)->save($map);
			if($val)
			{
                $this->journals($_SESSION['name'],'修改了转账',$_POST['transfer_name']);
				echo $this->jump("修改成功","Transfer/transfer");
			}else {
				echo $this->jump("修改失败","Transfer/transfer");
			}
		}
		elseif(!empty($_GET['id'])){
	        $transfer=M("transfer");
            $bmid = session('department_id');
        // var_dump($bmid);exit;
        $director = M('stations')->where('department_id ='.$bmid.' AND station_name LIKE "%主管%"')->select();
        // var_dump($director);exit;
        $user_id = array_column($director,'id');
        // var_dump($user_id);exit;
        $a = implode(",",$user_id);
        // var_dump($a);exit;
        $user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
        // var_dump($user);exit;
        // var_dump($name);die;
        $this->assign('user', $user);
			$id=$_GET['id'];
			$sel=$transfer->where("id=".$id)->find();
			$this->assign('sel',$sel);
			$this->display();
		}
	}

    public function upload($data){
    	
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =     3145728000 ;// 设置附件上传大小
      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
      $upload->rootPath  =      './Public/'; // 设置附件上传根目录
      // 上传单个文件 
      $info   =   $upload->uploadOne($data);
      // var_dump($data);exit;
      if(!$info) {// 上传错误提示错误信息
        return false;
          //return  $upload->getError();
      }else{// 上传成功 获取上传文件信息
          return $info['savepath'].$info['savename'];
      }
  }
  //删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$zhuanzhang=M('transfer');
			$id=$_GET['id'];
			$transfer['flag'] = 1;
		 	$val=$zhuanzhang->where("flag = 0 and id = ".$id)->save($transfer);
			if($val>0)
			{
                $this->journals($_SESSION['name'],'删除了转账',$_POST['transfer_name']);
				echo $this->jump("删除成功","Transfer/transfer");
			}else 
				{
				echo $this->jump("删除失败","Transfer/transfer");
			}		
		}
	}

	public function info(){
		$transfer=M('transfer');
		$id=$_GET['id'];
		$arr=$transfer->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function look(){
        $user_bmid = session('department_id');
        $Personnel = M('departments')->where('id ='.$user_bmid.' AND department_name LIKE "%人事%"')->find();
        $station = M('stations')->where('id='.$_SESSION['station_id'].' AND station_name LIKE "%人事%" ')->find();

        if(session('administration') == 0 || $Personnel || $station){
            $data = M('transfer')->where('status = 2 AND flag=0')->field('transfer_name,transfer_contract,transfer_allocation,transfer_certificate,transfer_configuration,transfer_talent,transfer_match,transfer_huming,transfer_amount,transfer_bank,transfer_account,transfer_note,transfer_paid,transfer_pic,transfer_information')->select();
        }else{
            $id = session('id');
            $data = M('transfer')->where('tid='.$id.' AND status = 2 AND flag=0')->field('transfer_name,transfer_contract,transfer_allocation,transfer_certificate,transfer_configuration,transfer_talent,transfer_match,transfer_huming,transfer_amount,transfer_bank,transfer_account,transfer_note,transfer_paid,transfer_pic,transfer_information')->select();
        }
        
        // $data = M('transfer')->where('status = 2')->field('transfer_name,transfer_contract,transfer_allocation,transfer_certificate,transfer_configuration,transfer_talent,transfer_match,transfer_huming,transfer_amount,transfer_bank,transfer_account,transfer_note,transfer_paid,transfer_pic,transfer_information')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '申请人');
        $objActSheet->setCellValue('B1', '人才合同价格');
        $objActSheet->setCellValue('C1', '配置企业价格');
        $objActSheet->setCellValue('D1', '证书类别');
        $objActSheet->setCellValue('E1', '配置企业');
        $objActSheet->setCellValue('F1', '人才姓名');
        $objActSheet->setCellValue('G1', '配出年月');
        $objActSheet->setCellValue('H1', '户名');
        $objActSheet->setCellValue('I1', '本次打款金额');
        $objActSheet->setCellValue('J1', '开户行');
        $objActSheet->setCellValue('K1', '账号');
        $objActSheet->setCellValue('L1', '备注');
        $objActSheet->setCellValue('M1', '已付金额');
        $objActSheet->setCellValue('N1', '资料上传');
        $objActSheet->setCellValue('O1', '财务备注信息');
        //设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
         $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
         $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('L')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('M')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('N')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('O')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('L')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

         //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('N1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('O1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //字段字体
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setName('宋体') //字体
        ->setSize(12)
        ->setBold(true);

        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['transfer_name']);    
            $objActSheet->setCellValue('B'.$k, $v['transfer_contract']);    
            $objActSheet->setCellValue('C'.$k, $v['transfer_allocation']);    
            $objActSheet->setCellValue('D'.$k, $v['transfer_certificate']);
            $objActSheet->setCellValue('E'.$k, $v['transfer_configuration']);
            $objActSheet->setCellValue('F'.$k, $v['transfer_talent']);    
            $objActSheet->setCellValue('G'.$k, $v['transfer_match']);    
            $objActSheet->setCellValue('H'.$k, $v['transfer_huming']);    
            $objActSheet->setCellValue('I'.$k, $v['transfer_amount']);
            $objActSheet->setCellValue('J'.$k, $v['transfer_bank']);
            $objActSheet->setCellValue('K'.$k, $v['transfer_account']);    
            $objActSheet->setCellValue('L'.$k, $v['transfer_note']);    
            $objActSheet->setCellValue('M'.$k, $v['transfer_paid']);    
            $objActSheet->setCellValue('N'.$k, $v['transfer_pic']);
            $objActSheet->setCellValue('O'.$k, $v['transfer_information']);


            //  $img = \Db::table('demo1')->where('id = '.$v['id'])->field('img')->find();
            // // 图片生成
            // $objDrawing[$k] = new \PHPExcel_Worksheet_Drawing();
            // $objDrawing[$k]->setPath('./static/'.$img['img']);
            // // 设置宽度高度
            // $objDrawing[$k]->setHeight(80);//照片高度
            // $objDrawing[$k]->setWidth(80); //照片宽度
            // /*设置图片要插入的单元格*/
            // $objDrawing[$k]->setCoordinates('E'.$k);
            // // 图片偏移距离
            // $objDrawing[$k]->setOffsetX(12);
            // $objDrawing[$k]->setOffsetY(12);
            // $objDrawing[$k]->setWorksheet($objPHPExcel->getActiveSheet());
            
                
            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(40);
            
        }
        
        $fileName = 'test';
        $date = date("Y-m-d",time());
        $fileName .= "_{$date}.xls";
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        // $objPHPExcel->setActiveSheetIndex(0);
        // header('Content-Type: application/vnd.ms-excel');
        // header("Content-Disposition: attachment;filename=\"$fileName\"");
        // header('Cache-Control: max-age=0');
        // $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // $objWriter->save('php://output'); //文件通过浏览器下载
        ob_end_clean();//清除缓冲区,避免乱码
        // $write = new \PHPExcel_Writer_Excel5($objPHPExcel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Content-Disposition:attachment;filename=\"$fileName\"");
        header("Content-Transfer-Encoding:binary");
        $objWriter->save('php://output'); 
    }
	
}