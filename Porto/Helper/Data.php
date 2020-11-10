<?php
namespace OmnyfyCustomization\Porto\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Cms\Model\Page as CmsPage;

class Data extends AbstractHelper
{

    protected $_logo;
    protected $_cmspage;
    
    public function __construct(
        Context $context,
        Logo $logo,
        CmsPage $cmspage
    )
    {        
        $this->_logo = $logo;
        $this->_cmspage = $cmspage;
        parent::__construct($context);
    }
    
    public function isHomePage() {
        return $this->_logo->isHomePage();
    }

    public function isPreLogin() {
        try {
            $url_key = $this->_cmspage->getIdentifier();
            if ($url_key == 'pre-login') {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}