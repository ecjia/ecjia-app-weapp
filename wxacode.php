<?php

class wxacode extends ecjia_front
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function init()
    {
        $uuid = trim($this->request->query('uuid'));
        $storeid = trim($this->request->query('storeid'));
        
		$qrimg = with(new Ecjia\App\Weapp\WxaCode())->getStoreWxaCode($storeid);
		
		$this->displayContent($qrimg, 'image/png');
    }
    
}

// end