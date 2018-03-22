<?php

namespace Admin\Model;
use Think\Model;
class ValidationModel extends Model{

   protected $_validate = array(
     array('applicant','require', '申请人不能为空！'),
     array('out_addr', 'require', '请填写外出地址！'),
     array('out_reason', 'require', '请填写外出原因'),
     array('out_time', 'require', '开始时间不能为空'),
     array('back_time', 'require', '结束时间不能为空'),
     array('aid', 'require', '请选择一个主管'),
   );
}
