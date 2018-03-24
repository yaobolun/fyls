<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class PersonalController extends Controller
{
	public function personal()
	{
		$this->display();
	}
}