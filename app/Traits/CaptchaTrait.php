<?php namespace App\Traits;

use Input;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck()
    {

        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = '6Lff_v0SAAAAACu-X_jR2QCRbdiSkFvDCCQp8nI4';

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

}
