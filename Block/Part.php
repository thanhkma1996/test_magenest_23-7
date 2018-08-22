<?php
namespace Test\Magenest\Block;

use  Magento\Framework\View\Element\Template;

class Part extends Template
{
    private $_parttimeCollection;


    public function __construct(
        Template\Context $context,
        \Test\Magenest\Model\ResourceModel\Test\CollectionFactory $parttimeCollection,array $data = [])
    {
        parent::__construct($context, $data);
        $this->_parttimeCollection = $parttimeCollection;

    }

    public function getpart()
    {
        $collection = $this->_parttimeCollection->create();
        return $collection;
    }


}