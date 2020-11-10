<?php
namespace OmnyfyCustomization\PreLogin\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CheckLoginObserver implements ObserverInterface
{

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;


    public function __construct(
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->_customerSession = $customerSession;
    }

    public function execute(Observer $observer)
    {
        $actionName = $observer->getRequest()->getFullActionName();
        $openActions = [
            'contact_index_index',
            'blog_index_index',
            'customer_account_login',
            'customer_account_create',
            'customer_account_loginPost',
            'customer_account_createPost'
        ];

        if ($actionName == 'customer_account_logoutSuccess') {
            $baseUrl = $observer->getRequest()->getBaseUrl();
            $observer->getControllerAction()->getResponse()->setRedirect($baseUrl . '/pre-login');
            return;
        }

        if (in_array($actionName, $openActions)) return;

        if (!$this->_customerSession->isLoggedIn()) {
            if ($actionName != 'cms_page_view') {
                $baseUrl = $observer->getRequest()->getBaseUrl();
                $observer->getControllerAction()->getResponse()->setRedirect($baseUrl . '/pre-login');
            }
        } 
    }
}