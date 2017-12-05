<?php
namespace app\superpay\controller;
class Index extends \app\index\controller\Common
{

    public function index()
    {

        if (request() -> isPost()) {
            
            $url = request() -> server('HTTP_REFERER');
            if (!$url) {
                $this -> error('非法请求！');
            }

            if (!\think\Session::get('user_id')) {
                $this -> error('请登录！','user/auth/login');
            }

            if (!$p = \ebcms\Crypt::decode(input('code'), substr(\think\Config::get('safe_code'), 8))) {
                $this -> error('支付失效！');
            }

            if (!isset($p['title']) || !isset($p['sign']) || !isset($p['currency']) || !isset($p['price']) || !isset($p['expire'])) {
                $this -> error('参数错误！');
            }

            // 严谨模式
            if (false !== \ebcms\Config::get('superpay.safe_mode')) {
                if (!\think\Session::has('payment.'.$p['sign'])) {
                    $this -> error('非法提交！');
                }
                if (\think\Session::pull('payment.'.$p['sign']) != $p) {
                    $this -> error('非法提交！');
                }
            }

            $sign = $p['sign'];
            $currency = $p['currency'];
            $price = $p['price'];
            $title = $p['title'];
            
            $currencys = \ebcms\Config::get('user.base.currency');
            if (!isset($currencys[$currency])) {
                $this -> error('参数错误！');
            }

            $buyed = false;
            if ($log = \think\Db::name('superpay') -> where(['sign'=>$sign,'user_id'=>\think\Session::get('user_id')]) -> find()) {
                $buyed = true;
                if ($log['expire_time'] > time() || !$log['expire_time']) {
                    $this -> error('已经购买过了，无须重复购买！');
                }
            }

            $user = \app\user\model\User::get(\think\Session::get('user_id'));
            if (!$user['status']) {
                $this -> error('您的账户异常！');
            }

            // 流水
            $opt = [
                'user_id'   =>  \think\Session::get('user_id'),
                'remark'   =>  '超级支付：' . $title,
                'num'   =>  $price,
                'currency'   =>  $currency,
            ];

            if (true !== $res = \app\user\extend\Currency::dec($opt)) {
                $this -> error($res);
            }

            if ($buyed) {
                $where = [
                    'sign'          =>  $sign,
                    'user_id'       =>  \think\Session::get('user_id'),
                ];
                \think\Db::name('superpay') -> where($where) -> setField('expire_time', $p['expire'] ? time() + $p['expire'] : 0);
            }else{
                $data = [
                    'sign'          =>  $sign,
                    'user_id'       =>  \think\Session::get('user_id'),
                    'expire_time'   =>  $p['expire']?time()+$p['expire'] : 0,
                ];
                \think\Db::name('superpay') -> insert($data);
            }

            $this -> success('购买成功！');
        }
    }

}