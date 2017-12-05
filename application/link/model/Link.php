<?php
namespace app\link\model;

use think\Model;

class Link extends Model
{

	protected $name = 'link_link';
    protected $pk = 'id';
    protected $autoWriteTimestamp = true;
    
    public function lists(){
    	return \app\link\model\Link::where(['status'=>1]);
    }

}