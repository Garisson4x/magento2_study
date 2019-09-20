<?php
namespace Shellpea\HelloWorld;
use Magento\Catalog\Controller\Product\View;
class MyView extends View
{
    public function execute()
    {
        die('123');
    }
}
