<?php

namespace Kanboard\Plugin\KanboardSupport\Helper;

use Kanboard\Core\Base;

class SupportHelper extends Base
{
    public function getBrowser()
    {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "N/A";
        $browsers = [
     '/msie/i' => 'Internet explorer',
     '/firefox/i' => 'Firefox',
     '/safari/i' => 'Safari',
     '/chrome/i' => 'Chrome',
     '/edge/i' => 'Edge',
     '/opera/i' => 'Opera',
     '/mobile/i' => 'Mobile browser',
    ];
        foreach ($browsers as $regex => $value) {
     if (preg_match($regex, $user_agent)) {
       $browser = $value;
     }
    }
        return $browser;
    }

}
