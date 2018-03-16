<?php
defined ( 'SYSPATH' ) or die ( 'No direct access allowed.' );

require_once Kohana::find_file('controllers','imp');
require_once Kohana::find_file('PHPExcel','Classes/PHPExcel');

class Index_Controller extends Api_Controller{
	public function index(){
		$this->template = new View('template/index');
		$this->template->render(TRUE);
	}
	
	public function user(){
		$filename = "user.xls";
		$this -> excel($filename);
	}
	/**
	 * excel����
	 */
	public function excel($filename){
		
		$sheetname = "";
		$data = impExcel($filename,$sheetname);
		$m = new test_Model();
		for($i = 0;$i<count($data);$i++)
		{
				$name = $data[$i]["����"];
				$position = $data[$i]["ְλ"];
				$inster['name'] = $name;
				$inster['position']=$position;
			
				$result = $m->insert($inster);
				if($result == 0)
					echo "ִ��ʧ�ܵ����(��Դ):".$i.$sql2."<br>";
								
		}
		//echo '�Ѿ�����'.$i.'��'.'<br>';
	}
	
	/**
	 * excel ����
	 */
	
	public function excel_out(){
		$m = new test_Model();
		$result = $m -> query_list('*');
		
 		$data = $result['list'];
 		$objPHPExcel=new PHPExcel();
 		$objPHPExcel->getProperties()->setCreator('local.test.com')
 		->setLastModifiedBy('local.test.com')
 		->setTitle('Office 2007 XLSX Document')
 		->setSubject('Office 2007 XLSX Document')
 		->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
 		->setKeywords('office 2007 openxml php')
 		->setCategory('Result file');
 		$objPHPExcel->setActiveSheetIndex(0)
 		->setCellValue('A1','ID')
 		->setCellValue('B1','����')
 		->setCellValue('C1','ְλ');
 		//var_dump($data);die;
 		$i=2;
 		foreach($data as $k=>$v){
 			$objPHPExcel->setActiveSheetIndex(0)
 			->setCellValue('A'.$i,$v['id'])
 			->setCellValue('B'.$i,$v['name'])
 			->setCellValue('C'.$i,$v['position']);
 			$i++;
 			//var_dump($objPHPExcel);die;
 		}
 		$objPHPExcel->getActiveSheet()->setTitle('��ְԱ��');
 		$objPHPExcel->setActiveSheetIndex(0);
 		$filename=urlencode('').date('Y-m-dHis');
 		
 		
 		/*
 		 *����xlsx�ļ�
 		 **/
 		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
 		header('Cache-Control: max-age=0');
 		$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
 		
 		
 		/*
 		 *����xls�ļ�
 		 *
 		header('Content-Type: application/vnd.ms-excel');
 		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
 		header('Cache-Control: max-age=0');
 		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 		*/
 		
 		$objWriter->save('php://output');
 		exit;
	}
}