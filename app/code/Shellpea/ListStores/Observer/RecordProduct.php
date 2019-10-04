<?php
namespace Shellpea\ListStores\Observer;

use \Magento\Framework\Event\ObserverInterface;

class RecordProduct implements ObserverInterface
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    protected function makeSingleArray($arr)
    {
        if (!is_array($arr)) {
            return false;
        }
        $tmp = array();
        foreach ($arr as $val) {
            if (is_array($val)) {
                $tmp = array_merge($tmp, $this->makeSingleArray($val));
            } else {
                $tmp[] = $val;
            }
        }
        return $tmp;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $productUpdate = json_decode(json_encode($observer->getEvent()->getProduct()->getData()), true);
        $productOrig = json_decode(json_encode($observer->getEvent()->getProduct()->getOrigData()), true);

        $arrOut1 = $this->makeSingleArray($productUpdate);
        $arrOut2 = $this->makeSingleArray($productOrig);
        $update = array_diff($arrOut1, $arrOut2);

        foreach ($update as $single) {
            if (!($single == null)) {
                $this->logger->info($single);
            }
        }
    }
}
