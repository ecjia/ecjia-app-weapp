<?php

namespace Ecjia\App\Weapp;

use Royalcms\Component\App\AppParentServiceProvider;

class WeappServiceProvider extends  AppParentServiceProvider
{
    
    public function boot()
    {
        $this->package('ecjia/app-weapp', null, dirname(__DIR__));
    }
    
    public function register()
    {
        
    }
    
    
    
}