<?php
namespace SR\EavCollectionGrid\Block\Adminhtml\Product;

class Attribute extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_product_attribute';
        $this->_blockGroup = 'SR_EavCollectionGrid';
        $this->_headerText = __('Eav Collection Grid');
        $this->_addButtonLabel = __('Add New Custom Attribute');
        parent::_construct();
    }
}