<?php
namespace App\Library\Pay\Demo; use App\Library\Pay\ApiInterface; use Illuminate\Support\Facades\Log; class Api implements ApiInterface { private $url_notify = ''; private $url_return = ''; public function __construct($spe00284) { $this->url_notify = SYS_URL_API . '/pay/notify/' . $spe00284; $this->url_return = SYS_URL . '/pay/return/' . $spe00284; } function goPay($spc27de0, $spba04f6, $sp9f49de, $sp224c81, $sp6956b3) { sleep(5); header('Location:' . $this->url_return . '/' . $spba04f6); die; } function verify($spc27de0, $sp4294a3) { $spb2acff = isset($spc27de0['isNotify']) && $spc27de0['isNotify']; if ($spb2acff) { } else { $spd56469 = @$spc27de0['out_trade_no']; if (strlen($spd56469) < 5) { throw new \Exception('交易单号未传入'); } $spefaf7d = date('YmdHis'); $sp4294a3($spd56469, \App\Order::whereOrderNo($spd56469)->first()->paid, $spefaf7d); return true; } return true; } }