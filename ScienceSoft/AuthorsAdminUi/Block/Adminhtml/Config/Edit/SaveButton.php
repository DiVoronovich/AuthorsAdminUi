<?php
declare(strict_types=1);

namespace ScienceSoft\AuthorsAdminUi\Block\Adminhtml\Config\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * "Save" button data provider
 */
class SaveButton implements ButtonProviderInterface
{
    /**
     * @inheritdoc
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label'          => __('Save'),
            'class'          => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order'     => 20,
        ];
    }
}
