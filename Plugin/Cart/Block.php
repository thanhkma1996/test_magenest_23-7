<?php
namespace Test\Magenest\Plugin\Cart;

class Block{

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ){

        $this->logger = $logger;
    }
    /**
     * Using after method change  return value of toHtml
     */
    public function afterToHtml(\Magento\Framework\View\Element\AbstractBlock $block ,$result){

        $moduleName = $block->getModuleName();
        $nameInLayout = $block->getNameInLayout();

        $_disableBlocksNameInLayout = array(
            'product.info.addtocart','product.info.addtocart.additional','product.info.addtocart.bundle',

        );
        /**
         * If block name is match then return Blank
         */
        if(in_array($nameInLayout ,$_disableBlocksNameInLayout)){
            return "";
        }
        return $result;
    }

}