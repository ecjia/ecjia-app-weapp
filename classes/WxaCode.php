<?php

namespace Ecjia\App\Weapp;

use platform_account;
use RC_Loader;
use RC_Cache;

class WxaCode
{
    protected $uuid;
    
    public function __construct($uuid = null)
    {
        $this->uuid = $uuid;
    }
    
    public function defaultWeappUUID()
    {
        RC_Loader::load_app_class('platform_account', 'platform', false);
        
        $platform_list = platform_account::getAccountList('weapp');
        
        $account = head($platform_list);
        
        if ($account) {
            $uuid = $account['uuid'];
        } else {
            $uuid = null;
        }
        
        return $uuid;
    }
    
    public function defaultWxaCode($scene, $uuid = null)
    {
        $qrimg = $this->getCacheImage($scene);
        if (empty($qrimg)) {
            if (is_null($uuid)) {
                $this->uuid = $this->defaultWeappUUID();
            }
            
            if (empty($this->uuid)) {
                return new \ecjia_error('not_found_weapp_uuid', '没有可用的小程序的UUID参数');
            }
            
            $WeappUUID =  new WeappUUID($this->uuid);
            $weapp = $WeappUUID->getWeapp();
            
            $qrimg = $weapp->qrcode->getAppCodeUnlimit($scene);
            
            $this->setCacheImage($scene, $qrimg);
        }
        
        return $qrimg;
    }
    
    protected function setCacheImage($key, $img) {
        $img = base64_encode($img);
        RC_Cache::app_cache_set($this->uuid.$key, $img, 'weapp', 1296000);
    }
    
    protected function getCacheImage($key) {
        $img = RC_Cache::app_cache_get($this->uuid.$key, 'weapp');
        return base64_decode($img);
    }
    
    /**
     * 获取店铺小程序二维码
     */
    public function getStoreWxaCode($storeid)
    {
        $scene = 'storeid:'.$storeid;
        $qrimg = $this->defaultWxaCode($scene);
        return $qrimg;
    }
    
}

// end