<?php
namespace Test\Magenest\Controller\Adminhtml\Test;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class newmagenest extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_Magenest::newmagenest');
    }

}