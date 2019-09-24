<?php
namespace Shellpea\TemplateBlock\Plugin;
class CostomTemplate
{
    public function beforeSetTemplate(\Magento\Catalog\Block\Product\View\Description $subject, $template)
    {
        $template = 'Shellpea_TemplateBlock::index.phtml';
        return $template;
    }
}
