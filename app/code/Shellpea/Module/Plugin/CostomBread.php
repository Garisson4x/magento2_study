<?php
namespace Shellpea\Module\Plugin;

class CostomBread
{

    /**
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array
     */
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo) {

        $crumbInfo['label'] = $crumbInfo['label'].'!';

        return [$crumbName, $crumbInfo];
    }
}
