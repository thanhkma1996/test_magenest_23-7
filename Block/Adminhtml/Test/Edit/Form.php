<?php
namespace Test\Magenest\Block\Adminhtml\Test\Edit;
use \Magento\Backend\Block\Widget\Form\Generic;
use function PHPSTORM_META\type;

class Form extends Generic
{
    protected $systemStore;
    protected $status;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_form');
        $this->setTitle(__('Movie Information'));
    }

    protected function _prepareForm()
    {
        $model=$this->_coreRegistry->registry('magenest_edit');
        $form = $this->_formFactory->create(
            ['data' =>
                [
                    'id' => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );
        $form->setHtmlIdPrefix('member_id');
        $fieldset = $form->addFieldset(
            'general_fieldset',
            [
                'legend' => __('Movie Information'),
                'class' => 'fieldset-wide'
            ]
        );
       if($model !=null) {
            $fieldset->addField(
                'member_id',
                'text',
                [
                    'name' => 'member_id',
                    'label' => __('Member ID'),
                    'title' => __('Member ID'),
                    'require' => true
                ]
            );
            };
        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label'=>__('Name'),
                'title'=>__('Name'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'phone',
            'text',
            [
                'name'=> 'phone',
                'label'=>__('Phone'),
                'title'=>__('Phone'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'address',
            'text',
            [
                'name'=>'address',
                'label'=>__('Address'),
                'title'=>__('Address'),
                'require'=>true
            ]
        );


        if($model != null){
            $form->setValues($model->getData());
            $this->setForm($form);
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}