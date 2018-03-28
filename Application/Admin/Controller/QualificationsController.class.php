<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8"); 

class QualificationsController extends Controller {
	public function qualifications(){
		$sid = session('id');
		$qualifications=M('qualifications');
		$count=$qualifications->where("flag = 0 and tid=".$sid)->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$arr=$qualifications->where("flag = 0 and tid=".$sid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function qualifications_add()
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
	public function qualifications_doadd(){
		if(!empty($_POST['sub'])){
			$qualifications=M("qualifications");
			$map['qualifications_date']=$_POST['qualifications_date'];
			$map['qualifications_customer']=$_POST['qualifications_customer'];
			$map['qualifications_applicant']=$_POST['qualifications_applicant'];
			$map['qualifications_enterprise']=$_POST['qualifications_enterprise'];
			$map['qualifications_aptitude']=$_POST['qualifications_aptitude'];
			$map['qualifications_arrival']=$_POST['qualifications_arrival'];
			$map['qualifications_contract']=$_POST['qualifications_contract'];
			$map['qualifications_money']=$_POST['qualifications_money'];
			$map['qualifications_account']=$_POST['qualifications_account'];
			$map['qualifications_bmoney']=$_POST['qualifications_bmoney'];
			$map['qualifications_relations']=$_POST['qualifications_relations'];
			$map['qualifications_remarks']=$_POST['qualifications_remarks'];
			$map['status']=$_POST['status'];
			$map['tid']=$_POST['tid'];
			$map['department_id']=$_POST['department_id'];
			$query=$qualifications->add($map);
			if($query>0){
				echo $this->jump('添加成功','Qualifications/qualifications');
			}
			else{
				echo $this->jump('添加失败','Qualifications/qualifications_add');
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
    public function qualifications_mod()
	{
		$qualifications=M('qualifications');
			
		if (!empty($_POST['sub'])) {
			$id=$_POST['id'];
			$map['qualifications_date']=$_POST['qualifications_date'];
			$map['qualifications_customer']=$_POST['qualifications_customer'];
			$map['qualifications_applicant']=$_POST['qualifications_applicant'];
			$map['qualifications_enterprise']=$_POST['qualifications_enterprise'];
			$map['qualifications_aptitude']=$_POST['qualifications_aptitude'];
			$map['qualifications_arrival']=$_POST['qualifications_arrival'];
			$map['qualifications_contract']=$_POST['qualifications_contract'];
			$map['qualifications_money']=$_POST['qualifications_money'];
			$map['qualifications_account']=$_POST['qualifications_account'];
			$map['qualifications_bmoney']=$_POST['qualifications_bmoney'];
			$map['qualifications_relations']=$_POST['qualifications_relations'];
			$map['qualifications_remarks']=$_POST['qualifications_remarks'];
			$val=$qualifications->where("id=".$id)->save($map);
			if($val)
			{
				echo $this->jump("修改成功","Qualifications/qualifications");
			}else {
				echo $this->jump("修改失败","Qualifications/qualifications");
			}
		}
		elseif(!empty($_GET['id'])){
	
			$id=$_GET['id'];
			$sel=$qualifications->where()->join()->find("$id");
			$this->assign('sel',$sel);
			$this->display();
		}
	}
	//删除数据
	public function del()
	{
		if(!empty($_GET['id'])){
			$daozhang=M('qualifications');
			$id=$_GET['id'];
			$qualifications['flag'] = 1;
		 	$val=$daozhang->where("flag = 0 and id = ".$id)->save($qualifications);
			if($val>0)
			{
				echo $this->jump("删除成功","Qualifications/qualifications");
			}else 
				{
				echo $this->jump("删除失败","Qualifications/qualifications");
			}		
		}
	}
	public function info(){
		$qualifications=M('qualifications');
		$id=$_GET['id'];
		$arr=$qualifications->where("id=".$id)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
	}
	public function look(){
        
        $data = M('qualifications')->where('status = 2')->field('qualifications_date,qualifications_customer,qualifications_applicant,qualifications_enterprise,qualifications_aptitude,qualifications_arrival,qualifications_contract,qualifications_money,qualifications_account,qualifications_bmoney,qualifications_bmoney,qualifications_remarks')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '日期');
        $objActSheet->setCellValue('B1', '市场部客服');
        $objActSheet->setCellValue('C1', '申请人');
        $objActSheet->setCellValue('D1', '企业名称');
        $objActSheet->setCellValue('E1', '资质名称');
        $objActSheet->setCellValue('F1', '本次到账日期');
        $objActSheet->setCellValue('G1', '合同价格');
        $objActSheet->setCellValue('H1', '已到账金额');
        $objActSheet->setCellValue('I1', '到账账号');
        $objActSheet->setCellValue('J1', '本次到账金额');
        $objActSheet->setCellValue('K1', '公关费');
        $objActSheet->setCellValue('L1', '备注');
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

        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['qualifications_date']);    
            $objActSheet->setCellValue('B'.$k, $v['qualifications_customer']);    
            $objActSheet->setCellValue('C'.$k, $v['qualifications_applicant']);    
            $objActSheet->setCellValue('D'.$k, $v['qualifications_enterprise']);
            $objActSheet->setCellValue('E'.$k, $v['qualifications_aptitude']);
            $objActSheet->setCellValue('F'.$k, $v['qualifications_arrival']);    
            $objActSheet->setCellValue('G'.$k, $v['qualifications_contract']);    
            $objActSheet->setCellValue('H'.$k, $v['qualifications_money']);    
            $objActSheet->setCellValue('I'.$k, $v['qualifications_account']);
            $objActSheet->setCellValue('J'.$k, $v['qualifications_bmoney']);
            $objActSheet->setCellValue('K'.$k, $v['qualifications_relations']);    
            $objActSheet->setCellValue('L'.$k, $v['qualifications_remarks']);    
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