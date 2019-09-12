<?php
namespace Shellpea\Module\Plugin;
class CostomFooter
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result) {
        return $result = 'Customized copyright!';
    }
}
