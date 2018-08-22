<?php

namespace Test\Magenest\Controller\Part;

use Magento\Framework\App\Action\Context;

class  Infor extends \Magento\Framework\App\Action\Action
{


    protected $resultJsonFactory;


    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;

    }

    public function execute()
    {

        if ($this->getRequest()->isAjax()) {

            $member_id = $this->getRequest()->getParam('member_id');

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

            $member = $objectManager->create('Test\Magenest\Model\Test')->load($member_id)->getData();

        }
//            $x = $this->resultJsonFactory->create()->setData([
//                'member_id' => $member['member_id'],
//                'name' => $member['name'],
//                'address' => $member['address'],
//                'phone' => $member['phone'],
//                'created_time' => $member['create_time'],
//                'updated_time' => $member['updated_time']
//            ]);
        return $this->resultJsonFactory->create()->setData([
            'member_id' => $member['member_id'],
            'name' => $member['name'],
            'address' => $member['address'],
            'phone' => $member['phone'],
            'create_time' => $member['create_time'],
            'updated_time' => $member['updated_time']
        ]);
    }

}