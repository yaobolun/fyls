<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class RefundController extends Controller {

	public function refund(){
		$sid = session('id');
		$refund=M('refund');
		$count=$refund->where("flag = 0 and tid=".$sid)->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$refund->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function refund_add()
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
	public function refund_doadd(){
		
		if(!empty($_POST['sub'])){
			$refund=M("refund");
			$map['refund_applicant']=$_POST['refund_applicant'];
			$map['refund_match']=$_POST['refund_match'];
			$map['refund_equip']=$_POST['refund_equip'];
			$map['refund_contract']=$_POST['refund_contract'];
			$map['refund_remarks']=$_POST['refund_remarks'];
			$map['refund_account']=$_POST['refund_account'];
			$map['refund_name']=$_POST['refund_name'];
			$map['refund_money']=$_POST['refund_money'];
			$map['refund_bank']=$_POST['refund_bank'];
			$map['refund_number']=$_POST['refund_number'];
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
            $map['zid']=$_POST['zid'];
			$map['department_id']=$_POST['department_id'];
			$query=$refund->add($map);
			if($query>0){
                $this->journals($_SESSION['name'],'申请了退款凭证企业',$_POST['refund_applicant']);
				echo $this->jump('添加成功','Refund/refund');
			}
			else{
				echo $this->jump('添加失败','Refund/refund_add');
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

    public function refund_mod()
	{
		$refund=M('refund');
		$map['refund_applicant']=$_POST['refund_applicant'];
		$map['refund_match']=$_POST['refund_match'];
		$map['refund_equip']=$_POST['refund_equip'];
		$map['refund_contract']=$_POST['refund_contract'];
		$map['refund_remarks']=$_POST['refund_remarks'];
		$map['refund_account']=$_POST['refund_account'];
		$map['refund_name']=$_POST['refund_name'];
		$map['refund_money']=$_POST['refund_money'];
		$map['refund_bank']=$_POST['refund_bank'];
		$map['refund_number']=$_POST['refund_number'];
        $map['status']=$_POST['status'];
        $map['zid']=$_POST['zid'];
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];

			$val=$refund->where("id=".$id)->save($map);
			if($val)
			{
                $this->journals($_SESSION['name'],'修改了退款凭证企业',$_POST['refund_applicant']);
				echo $this->jump("修改成功","Refund/refund");
			}else {
				echo $this->jump("修改失败","Refund/refund");
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
			$sel=$refund->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}

    //删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$tuikuan=M('refund');
			$id=$_GET['id'];
			$refund['flag'] = 1;
		 	$val=$tuikuan->where("flag = 0 and id = ".$id)->save($refund);
			if($val>0)
			{
                $this->journals($_SESSION['name'],'删除了退款凭证企业',$_POST['refund_applicant']);
				echo $this->jump("删除成功","Refund/refund");
			}else 
				{
				echo $this->jump("删除失败","Refund/refund");
			}		
		}
	}
	public function info(){
		$uid=$_GET['id'];
        // var_dump($uid);
		$refund=M('refund');
        $admin_user=M('admin_user');
        $aeq = $refund->join("left join requipment on refund.id = requipment.uid")
                       ->join("left join admin_user on requipment.requipment_customer = admin_user.id")
                       ->where("requipment.flag = 0 and refund.id=".$uid)
                       ->field("requipment.id,requipment_enterprise,requipment_contractyears,requipment_qualified,requipment_level,requipment_major,requipment_talent,requipment_customer,admin_user.name")
                       ->select();
                       // var_dump($aeq);exit;
		// $aeq=$refund->join('requipment ON refund.id = requipment.uid')->where("requipment.flag = 0 and refund.id=".$uid)->field("requipment.id,requipment_enterprise,requipment_contractyears,requipment_qualified,requipment_level,requipment_major,requipment_talent,requipment_customer")->select();
		$this->assign('aeq',$aeq);
		$id=$_GET['id'];
		$arr=$refund->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function look(){
        $user_bmid = session('department_id');
        $Personnel = M('departments')->where('id ='.$user_bmid.' AND department_name LIKE "%人事%"')->find();
        $station = M('stations')->where('id='.$_SESSION['station_id'].' AND station_name LIKE "%人事%" ')->find();

        if(session('administration') == 0 || $Personnel || $station){
            $data = M('refund')->where('status = 2 AND flag=0')->field('refund_applicant,refund_match,refund_equip,refund_contract,refund_remarks,refund_account,refund_name,refund_money,refund_bank,refund_number')->select();
        }else{
            $id = session('id');
            $data = M('refund')->where('tid='.$id.' AND status = 2 AND flag=0')->field('refund_applicant,refund_match,refund_equip,refund_contract,refund_remarks,refund_account,refund_name,refund_money,refund_bank,refund_number')->select();
        }
        
        // $data = M('refund')->where('status = 2')->field('refund_applicant,refund_match,refund_equip,refund_contract,refund_remarks,refund_account,refund_name,refund_money,refund_bank,refund_number')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '申请人');
        $objActSheet->setCellValue('B1', '配备年月');
        $objActSheet->setCellValue('C1', '配备企业');
        $objActSheet->setCellValue('D1', '合同价格');
        $objActSheet->setCellValue('E1', '备注');
        $objActSheet->setCellValue('F1', '已到账金额');
        $objActSheet->setCellValue('G1', '户名');
        $objActSheet->setCellValue('H1', '本次打款金额');
        $objActSheet->setCellValue('I1', '开户行');
        $objActSheet->setCellValue('J1', '账号');
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
        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['refund_applicant']);    
            $objActSheet->setCellValue('B'.$k, $v['refund_match']);    
            $objActSheet->setCellValue('C'.$k, $v['refund_equip']);    
            $objActSheet->setCellValue('D'.$k, $v['refund_contract']);
            $objActSheet->setCellValue('E'.$k, $v['refund_remarks']);
            $objActSheet->setCellValue('F'.$k, $v['refund_account']);    
            $objActSheet->setCellValue('G'.$k, $v['refund_name']);    
            $objActSheet->setCellValue('H'.$k, $v['refund_money']);    
            $objActSheet->setCellValue('I'.$k, $v['refund_bank']);
            $objActSheet->setCellValue('J'.$k, $v['refund_number']);


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