<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class ArrivalController extends Controller {
	public function arrival(){
		$sid = session('id');
		// var_dump($sid);exit;
		$arrival=M('arrival');
		$count=$arrival->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$arrival->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}

	public function arrival_add()
	{	
		
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
		$this->display();
	}

	public function arrival_doadd(){
		if(!empty($_POST['sub'])){
			$arrival=M("arrival");
			$map['arrival_applicant']=$_POST['arrival_applicant'];
			$map['arrival_account']=$_POST['arrival_account'];
			$map['arrival_time']=$_POST['arrival_time'];
			$map['arrival_money']=$_POST['arrival_money'];
			$map['arrival_paid']=$_POST['arrival_paid'];
			$map['arrival_contract']=$_POST['arrival_contract'];
			$map['arrival_equip']=$_POST['arrival_equip'];
			$map['arrival_remarks']=$_POST['arrival_remarks'];
			$map['arrival_enterprise']=$_POST['arrival_enterprise'];
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
			$map['department_id']=$_POST['department_id'];
			$query=$arrival->add($map);
			if($query>0){
				echo $this->jump('添加成功','Arrival/arrival');
			}
			else{
				echo $this->jump('添加失败','Arrival/arrival_add');
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
    public function arrival_mod()
	{
		$arrival=M('arrival');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['arrival_applicant']=$_POST['arrival_applicant'];
			$map['arrival_account']=$_POST['arrival_account'];
			$map['arrival_time']=$_POST['arrival_time'];
			$map['arrival_money']=$_POST['arrival_money'];
			$map['arrival_paid']=$_POST['arrival_paid'];
			$map['arrival_contract']=$_POST['arrival_contract'];
			$map['arrival_equip']=$_POST['arrival_equip'];
			$map['arrival_remarks']=$_POST['arrival_remarks'];
			$map['arrival_enterprise']=$_POST['arrival_enterprise'];
			$val=$arrival->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Arrival/arrival");
			}else {
				echo $this->jump("修改失败","Arrival/arrival");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$arrival->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$daozhang=M('arrival');
			$id=$_GET['id'];
			$arrival['flag'] = 1;
		 	$val=$daozhang->where("flag = 0 and id = ".$id)->save($arrival);
			if($val>0)
			{
				echo $this->jump("删除成功","Arrival/arrival");
			}else 
				{
				echo $this->jump("删除失败","Arrival/arrival");
			}		
		}
	}
	public function info(){
		$aid=$_GET['id'];
		
		// var_dump($a);exit;
		$arrival=M('arrival');
		$admin_user=M('admin_user');
		// $aeq=$arrival->join('aequipment ON arrival.id = aequipment.aid')->where("aequipment.flag = 0 and arrival.id=".$aid)->field("aequipment.id,aequipment_aenterprise,aequipment_contrac,aequipment_qualified,aequipment_level,aequipment_major,aequipment_talent,aequipment_customer")
			 // $admin_user->join('aequipment ON admin_user.id = aequipment_customer')->where("admin_user.id = aequipment_customer")->field("admin_user.name")
					// ->select();
		$aeq = $arrival->join("left join aequipment on arrival.id = aequipment.aid")
					   ->join("left join admin_user on aequipment.aequipment_customer = admin_user.id")
					   ->where("aequipment.flag = 0 and arrival.id=".$aid)
					   ->field("aequipment.aequipment_aenterprise,aequipment.aequipment_contrac,aequipment.aequipment_qualified,aequipment.aequipment_level,aequipment.aequipment_major,aequipment.aequipment_talent,aequipment.aequipment_customer,aequipment.id,admin_user.name")
					   ->select();
					   // var_dump($aeq);exit;
		$this->assign('aeq',$aeq);
		$id=$_GET['id'];
		$arr=$arrival->where("id=".$id)->select();
		// var_dump($arr);exit;
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function look(){
        
        $data = M('Arrival')->where('status = 2')->field('arrival_applicant,arrival_account,arrival_time,arrival_money,arrival_paid,arrival_contract,arrival_equip,arrival_remarks')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '申请人');
        $objActSheet->setCellValue('B1', '到账公司账号');
        $objActSheet->setCellValue('C1', '到账时间');
        $objActSheet->setCellValue('D1', '到账金额');
        $objActSheet->setCellValue('E1', '已付金额');
        $objActSheet->setCellValue('F1', '合同价格');
        $objActSheet->setCellValue('G1', '配备企业');
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
        $objPHPExcel->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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
            $objActSheet->setCellValue('A'.$k, $v['arrival_applicant']);    
            $objActSheet->setCellValue('B'.$k, $v['arrival_account']);    
            $objActSheet->setCellValue('C'.$k, $v['arrival_account']);    
            $objActSheet->setCellValue('D'.$k, $v['arrival_money']);
            $objActSheet->setCellValue('E'.$k, $v['arrival_paid']);
            $objActSheet->setCellValue('F'.$k, $v['arrival_contract']);    
            $objActSheet->setCellValue('G'.$k, $v['arrival_equip']);    
            $objActSheet->setCellValue('H'.$k, $v['arrival_equip']);    
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