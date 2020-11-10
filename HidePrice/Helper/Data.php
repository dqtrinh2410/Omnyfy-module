<?php
namespace OmnyfyCustomization\HidePrice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public function getIsEnable(){
        return $this->scopeConfig->getValue('changi_hide_price/group_hide_price/enabled', 
                                            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
