<?php

namespace Cn\Requestquote\Block\Adminhtml\Requestquote\Edit\Tab;

/**
 * Blog post edit form main tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;


    /**
     * @var \Cn\Requestquote\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Cn\Requestquote\Model\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Cn\Requestquote\Model\Requestquote */
        $model = $this->_coreRegistry->registry('requestquote_post');

        $isElementDisabled = false;

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Requestquote Information')]);

        if ($model->getId()) {
            $fieldset->addField('requestquote_id', 'hidden', ['name' => 'requestquote_id']);
        }

        $fieldset->addField(
            'productname',
            'text',
            [
                'name' => 'productname',
                'label' => __('Productname:'),
                'title' => __('Productname'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
         $fieldset->addField(
            'firstname',
            'text',
            [
                'name' => 'firstname',
                'label' => __('Firstname:'),
                'title' => __('Firstname'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
         $fieldset->addField(
            'lastname',
            'text',
            [
                'name' => 'lastname',
                'label' => __('Lastname:'),
                'title' => __('Lastname'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
         $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email:'),
                'title' => __('email'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );

         $fieldset->addField(
            'mobile',
            'text',
            [
                'name' => 'mobile',
                'label' => __('Mobile No:'),
                'title' => __('mobile'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'requestquotedetails',
            'text',
            [
                'name' => 'requestquotedetails',
                'label' => __('Requestquotedetails:'),
                'title' => __('requestquotedetails'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        ); 

        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status:'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => $this->_status->getOptionArray(),
                'disabled' => $isElementDisabled
            ]
        );
        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Requestquote Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Requestquote Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
