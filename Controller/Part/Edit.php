<?php

namespace Test\Magenest\Controller\Part;

class Edit extends \Magento\Framework\App\Action\Action {

    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ){
        parent::__construct($context);
    }

    public function execute()
    {

        if ($_POST) {

            $member_id = $this->getRequest()->getParam('member_id');

            $name = $this->getRequest()->getParam('name');
            $address = $this->getRequest()->getParam('address');
            $phone = $this->getRequest()->getParam('phone');
            $create_time = $this->getRequest()->getParam('create_time');
            $updated_time = $this->getRequest()->getParam('updated_time');



            $parttimeCollection = $this->_objectManager->create('Test\Magenest\Model\Test')->load($member_id);


            $parttimeCollection->setName($name);
            $parttimeCollection->setAddress($address);
            $parttimeCollection->setPhone($phone);
            $parttimeCollection->setCreateTime($create_time);
            $parttimeCollection->setUpdatedTime($updated_time);
            $parttimeCollection->save();



            $this->messageManager->addSuccess(__('Update Done'));

            return $this->_redirect('magenest/parttime/index');

        }
        return $this->_redirect('magenest/parttime/index');
    }
}