<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-9-12
 * Time: 下午12:16
 * To change this template use File | Settings | File Templates.
 */
class Helper extends CController
{
    //设置hash值
    public function setHash($input, $extra=""){
        $readConfig = new CConfiguration('/protected/config/uzs.setting.php');
        return md5($input.$extra.$readConfig->itemAt('hash_base_value'));
    }
}
