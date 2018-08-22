<?php
namespace Test\Magenest\Block\Adminhtml;
class Test extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Test_Magenest';
        $this->_controller = 'adminhtml_magenest';
        $this->removeButton('add');
        parent::_construct();
    }

    protected function _addNewButton()
    {
        $this->addButton(
            'add_button',
            [
                'label' => __('Add Magenest Partime'),
                'onclick' => 'setLocation(\'' . $this->getUrl('magenest/test/newmagenest') . '\')',
                'class' => 'add primary'
            ]
        );
    }


}