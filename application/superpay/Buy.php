<?php
namespace app\superpay;

class Buy
{

    public $config = [
        'title'         =>  '',
        'sign'          =>  '',
        'price'         =>  0,
        'currency'      =>  '',
        'code_expire'   =>  60,
        'expire'        =>  0,
    ];

    public function __construct($config = []){
        $this -> config = array_merge($this -> config,$config);
    }

    // 获取购买过的用户
    public function users()
    {
        return \app\superpay\model\Buy::with('user') -> where('sign', $this -> sign) -> order('id desc');
    }

    // 获取货币名称
    protected function currency_name()
    {
        $data = \ebcms\Config::get('user.base.currency');
        return isset($data[$this -> currency])?$data[$this -> currency]:$this -> currency;
    }

    // 获取是否需要购买
    protected function need_buy()
    {
        if (!\think\Session::get('user_id')) {
            return true;
        }
        $where = [
            'user_id'   =>  ['eq',\think\Session::get('user_id')],
            'sign'   =>  ['eq',$this -> sign],
        ];
        if ($log = \think\Db::name('superpay') -> where($where) -> find()) {
            if ($log['expire_time']>time() || !$log['expire_time']) {
                return false;
            }
        }
        return true;
    }

    // 获取支付链接
    protected function url()
    {
        return \think\Url::build('superpay/index/index');
    }

    // 获取支付链接
    protected function code()
    {
        $p = [
            'title'     =>  $this -> title,
            'sign'      =>  $this -> sign,
            'price'     =>  $this -> price,
            'currency'  =>  $this -> currency,
            'expire'    =>  $this -> expire,
        ];
        $code = \ebcms\Crypt::encode($p,substr(\think\Config::get('safe_code'), 8),$this -> code_expire);

        // 严谨模式
        if (false !== \ebcms\Config::get('superpay.safe_mode')) {
            \think\Session::set('payment.' . $this -> sign, $p);
        }

        return $code;
    }

    public function __get($name){

        // 检测属性获取器
        if (method_exists($this, $name)) {
            return $this->$name();
        }elseif (isset($this -> config[$name])) {
            return $this -> config[$name];
        }else{
            return $name;
        }
    }

    public function __set($name,$value){
        if (isset($this -> config[$name])) {
            $this -> config[$name] = $value;
        }
    }
}