<?php

namespace Ecjia\App\Weapp;

use Royalcms\Component\App\AppServiceProvider;

class WeappServiceProvider extends  AppServiceProvider
{
    
    public function boot()
    {
        $this->package('ecjia/app-weapp');
    }
    
    public function register()
    {
        
    }
    
    
    
}