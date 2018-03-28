<?php
namespace Admin\Controller;
use Think\Controller;
// include '__PUBLIC__/PHPExcel/PHPExcel.php';
// include '__PUBLIC__/PHPExcel/PHPExcel/Writer/Excel2007.php';
header("Content-Type: text/html;charset=utf-8"); 

class ExpreController extends Controller {

	public function index(){
    	if($_SESSION['id']=='')
    	{
    		echo $this->jump('Please login',"Index/login");
    	}else {
    		$this->display();
    	}
    }

    public function expre_index(){
    	$expre=M('expre');
    	$id = session('id');
        $bmid = session('department_id');
		$count=$expre->count();// 查询满足要求的总记录数
		$Page=new\Think\Page($count,10);//实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
        $arr=$expre->where('uid='.$id)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('arr',$arr);
		$this->assign('page',$show);
		$this->display();
    }

    //申请快递
    public function add_expre(){
    		$this->display();
    }
    public function doadd_expre()
    {
    	$expre = M('expre');
    	$map = $expre->create();
    	date_default_timezone_set('prc');
    	$map['time'] = date('Y-m-d H:i:s', time());
    	$query = $expre->add($map);
    	if($query>0){
    		echo $this->jump('申请成功，请等待审批。', 'Expre/expre_index');
    	}else{
    		echo $this->jump('申请失败，请重新申请！', 'Expre/add_expre');
    	}
    }

    public function express()
    {
    	$uid = session('id');
		$admin_user = M('admin_user');
		$user = $admin_user->where('id='.$uid)->find();
		$user_bmid = $user['department_id'];
		$user_qxid = $user['station_id'];
        $Personnel = M('departments')->where('id ='.$user_bmid.' AND department_name LIKE "%市场部%"')->find();
    	$condition = M('stations')->where('id ='.$user_qxid.' AND station_name LIKE "%主管%"')->find();
        if($Personnel == true || session('administration') == 0){
            $expre = M('expre');
            $count=$expre->count();
            $Page=new\Think\Page($count,10);
            $page= $Page->show();
            $show = $expre->select();
            $this->assign('arr', $show);
            $this->assign('page', $page);
            $this->display();
        }elseif($condition){
    		$arr = M('expre')->where('bm_id='.$user_bmid.' AND flag=0')->select();
    		$this->assign('arr', $arr);
    		$this->display();
    	}else{
    		echo $this->jump('你没有权限哦！', 'Travel/Travel_list');
    	}
    }
    public function expre_mod()
    {
    	$id = $_POST['id'];

    	$expre = M('expre');
    	$find = $expre->where('id='.$id)->find();
    	$find['flag'] = 1;
    	$update = $expre->where('id='.$find['id'])->save($find);
    	if($update){
    		echo $this->jump('已通过！', 'Expre/express');
    	}else{
    		echo $this->jump('操作出错了!', 'Expre/express');
    	}

    }
    public function not($id)
    {
    	$expre = M('expre');
    	$one_expre = $expre->where('id='.$id)->find();
		$one_expre['flag'] = 2;
		$leave = $expre->where('id='.$id)->save($one_expre);
		if($leave){
			echo $this->jump('你拒绝了TA ！', 'Expre/express');
		}else{
			echo $this->jump('操作失败！', 'Expre/express');
		}
    }
    public function expre_del($id)
    {
    	// var_dump($id);die;
    	$expre = M('expre');
    	$del = $expre->where('id='.$id)->delete();
    	if($del){
    		echo $this->jump('删除成功', 'Expre/express');
    	}else{
    		echo $this->jump('操作失败！', 'Expre/express');
    	}
    }

    /*跳转*/
    public  function jump($string,$url){
      $url=C('HOME_PATH').'/'.$url;
      return "<script language='javascript' type='text/javascript'>alert('".$string."');window.location.href='".$url."'; </script>";
    }

    public function expre_info()
    {
        $id = $_GET['id'];
        $expre = M('expre');
        $expre_info = $expre->where('id='.$id)->find();
        $departments = M('departments');
        $bmname = $departments->where($expre_info['bm_id'])->field('department_name')->find();
        $this->assign('expre_info', $expre_info);
        $this->assign('bmname', $bmname);
        $this->display();
    }

            //从数据库输出数据处理方式
            // //从数据库读取数据如：
            // $db = new Mysql($dbconfig);
            // $sql = "SELECT * FROM 表名";
            // $row = $db->GetAll($sql); // $row 为二维数组
            // $count = count($row);
            // for ($i = 2; $i <= $count+1; $i++) {
            //  $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, convertUTF8($row[$i-2][1]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, convertUTF8($row[$i-2][2]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, convertUTF8($row[$i-2][3]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, convertUTF8($row[$i-2][4]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, convertUTF8(date("Y-m-d", $row[$i-2][5])));
            //  $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, convertUTF8($row[$i-2][6]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, convertUTF8($row[$i-2][7]));
            //  $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, convertUTF8($row[$i-2][8]));
            // }
              
            // 在默认sheet后，创建一个worksheet
            // echo date('H:i:s') . " Create new Worksheet object\n";
            // $objPHPExcel->createSheet();
            // $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
            // $objWriter-save('php://output');
     public function look(){
        
        $data = M('expre')->where('flag = 1')->field('addressee,name,goods,tel,time,address,remarks')->select();

        // 导出Exl
        // Vendor('PHPExcel.PHPExcel.php');
        // Vendor('PHPExcel.PHPExcel.Writer.Excel2007.php');
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new \PHPExcel(); //这里new不出来 财报错的
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        // var_dump(111);die;
    
        $objActSheet = $objPHPExcel->getActiveSheet();
        
        $objActSheet->setCellValue('A1', '收件人');
        $objActSheet->setCellValue('B1', '寄件人');
        $objActSheet->setCellValue('C1', '物品');
        $objActSheet->setCellValue('D1', '收件人电话');
        $objActSheet->setCellValue('E1', '寄件时间');
        $objActSheet->setCellValue('F1', '寄件地址');
        $objActSheet->setCellValue('G1', '物品备注');
        //设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

         //水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);      
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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

        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['addressee']);    
            $objActSheet->setCellValue('B'.$k, $v['name']);    
                
            // 表格内容
            $objActSheet->setCellValue('C'.$k, $v['goods']);    
            $objActSheet->setCellValue('D'.$k, $v['tel']);
            $objActSheet->setCellValue('E'.$k, $v['time']);
            $objActSheet->setCellValue('F'.$k, $v['address']);
            $objActSheet->setCellValue('G'.$k, $v['remarks']);

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