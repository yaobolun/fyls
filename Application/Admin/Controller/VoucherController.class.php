<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class VoucherController extends Controller {

	public function voucher(){
		$sid = session('id');
		$voucher=M('voucher');
		$count=$voucher->where("flag = 0 and tid=".$sid)->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$voucher->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function voucher_add()
	{	
		
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
		$user = M('admin_user')->where('station_id IN ('.$a.') AND department_id='.$bmid)->select();
		// var_dump($user);exit;
		// var_dump($name);die;
		$this->assign('user', $user);
		$this->display();
	}
	public function voucher_doadd(){
		
		if(!empty($_POST['sub'])){
			$voucher=M("voucher");
			$map['voucher_applicant']=$_POST['voucher_applicant'];
			$map['voucher_account']=$_POST['voucher_account'];
			$map['voucher_equip']=$_POST['voucher_equip'];
			$map['voucher_contract']=$_POST['voucher_contract'];
			$map['voucher_amount']=$_POST['voucher_amount'];
			$map['voucher_acc']=$_POST['voucher_acc'];
			$map['voucher_this']=$_POST['voucher_this'];
			$map['voucher_remarks']=$_POST['voucher_remarks'];
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
            $map['zid']=$_POST['zid'];
			$map['department_id']=$_POST['department_id'];
			$query=$voucher->add($map);
			if($query>0){
                 $this->journals($_SESSION['name'],'申请了退款人才凭证',$_POST['voucher_applicant']);
				echo $this->jump('添加成功','Voucher/voucher');
			}
			else{
				echo $this->jump('添加失败','Voucher/voucher_add');
			}
		}
		else{
		$this->display();
		}

	}
	public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }
    public function voucher_mod()
	{
		$voucher=M('voucher');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['voucher_applicant']=$_POST['voucher_applicant'];
			$map['voucher_account']=$_POST['voucher_account'];
			$map['voucher_equip']=$_POST['voucher_equip'];
			$map['voucher_contract']=$_POST['voucher_contract'];
			$map['voucher_amount']=$_POST['voucher_amount'];
			$map['voucher_acc']=$_POST['voucher_acc'];
			$map['voucher_this']=$_POST['voucher_this'];
			$map['voucher_remarks']=$_POST['voucher_remarks'];
            $map['status']=$_POST['status'];
            $map['zid']=$_POST['zid'];
			$val=$voucher->where("id=".$id)->save($map);
			if($val)
			{
                $this->journals($_SESSION['name'],'修改了退款人才凭证',$_POST['voucher_applicant']);
				echo $this->jump("修改成功","Voucher/voucher");
			}else {
				echo $this->jump("修改失败","Voucher/voucher");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
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
			$sel=$voucher->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	public function del()
	{
		if(!empty($_GET['id'])){
			$rencai=M('voucher');
			$id=$_GET['id'];
			$voucher['flag'] = 1;
		 	$val=$rencai->where("flag = 0 and id = ".$id)->save($voucher);
			if($val>0)
			{
                $this->journals($_SESSION['name'],'删除了退款人才凭证',$_POST['voucher_applicant']);
				echo $this->jump("删除成功","Voucher/voucher");
			}else 
				{
				echo $this->jump("删除失败","Voucher/voucher");
			}		
		}
	}
	public function info(){
		$voucher=M('voucher');
		$id=$_GET['id'];
		$arr=$voucher->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function look(){
         $user_bmid = session('department_id');
        $Personnel = M('departments')->where('id ='.$user_bmid.' AND department_name LIKE "%人事%"')->find();
        $station = M('stations')->where('id='.$_SESSION['station_id'].' AND station_name LIKE "%人事%" ')->find();

        if(session('administration') == 0 || $Personnel || $station){
            $data = M('voucher')->where('status = 2 AND flag=0')->field('voucher_applicant,voucher_account,voucher_equip,voucher_contract,voucher_amount,voucher_acc,voucher_this,voucher_remarks')->select();
        }else{
            $id = session('id');
            $data = M('voucher')->where('tid='.$id.' AND status = 2 AND flag=0')->field('voucher_applicant,voucher_account,voucher_equip,voucher_contract,voucher_amount,voucher_acc,voucher_this,voucher_remarks')->select();
        }
        
        // $data = M('voucher')->where('status = 2')->field('voucher_applicant,voucher_account,voucher_equip,voucher_contract,voucher_amount,voucher_acc,voucher_this,voucher_remarks')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '申请人');
        $objActSheet->setCellValue('B1', '本次到账日期');
        $objActSheet->setCellValue('C1', '配备企业');
        $objActSheet->setCellValue('D1', '合同价格');
        $objActSheet->setCellValue('E1', '到账金额');
        $objActSheet->setCellValue('F1', '账户');
        $objActSheet->setCellValue('G1', '本次到账金额');
        $objActSheet->setCellValue('H1', '备注');
        //设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
         $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

         //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);;
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
        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['voucher_applicant']);    
            $objActSheet->setCellValue('B'.$k, $v['voucher_account']);    
            $objActSheet->setCellValue('C'.$k, $v['voucher_equip']);    
            $objActSheet->setCellValue('D'.$k, $v['voucher_contract']);
            $objActSheet->setCellValue('E'.$k, $v['voucher_amount']);
            $objActSheet->setCellValue('F'.$k, $v['voucher_acc']);    
            $objActSheet->setCellValue('G'.$k, $v['voucher_this']);    
            $objActSheet->setCellValue('H'.$k, $v['voucher_remarks']);    

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