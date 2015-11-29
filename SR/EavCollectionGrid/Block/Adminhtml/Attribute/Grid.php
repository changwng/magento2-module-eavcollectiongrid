<?php
/**
 * attributes grid
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
namespace SR\EavCollectionGrid\Block\Adminhtml\Attribute;

/**
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \SR\EavCollectionGrid\Model\ResourceModel\Attribute\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \SR\EavCollectionGrid\Model\ResourceModel\Attribute\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \SR\EavCollectionGrid\Model\ResourceModel\Attribute\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_module = 'eavcollectiongrid';
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * Block Module
     *
     * @var string
     */
    protected $_module = 'adminhtml';

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('attributeGrid');
        $this->setDefaultSort('attribute_code');
        $this->setDefaultDir('ASC');
    }

    /**
     * Prepare product attributes grid collection object
     *
     * @return $this
     */
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare default grid column
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addColumn(
            'attribute_code',
            [
                'header' => __('Attribute Code'),
                'sortable' => true,
                'index' => 'attribute_code',
                'header_css_class' => 'col-attr-code',
                'column_css_class' => 'col-attr-code'
            ]
        );

        $this->addColumn(
            'frontend_label',
            [
                'header' => __('Default label'),
                'sortable' => true,
                'index' => 'frontend_label',
                'header_css_class' => 'col-label',
                'column_css_class' => 'col-label'
            ]
        );

        $this->addColumn(
            'is_required',
            [
                'header' => __('Required'),
                'sortable' => true,
                'index' => 'is_required',
                'type' => 'options',
                'options' => ['1' => __('Yes'), '0' => __('No')],
                'header_css_class' => 'col-required',
                'column_css_class' => 'col-required'
            ]
        );

        $this->addColumn(
            'is_user_defined',
            [
                'header' => __('System'),
                'sortable' => true,
                'index' => 'is_user_defined',
                'type' => 'options',
                'options' => [
                    '0' => __('Yes'), // intended reverted use
                    '1' => __('No'), // intended reverted use
                ],
                'header_css_class' => 'col-system',
                'column_css_class' => 'col-system'
            ]
        );

        return $this;
    }

    /**
     * Return url of given row
     *
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl($this->_module . '/*/edit', ['attribute_id' => $row->getAttributeId()]);
    }
}
