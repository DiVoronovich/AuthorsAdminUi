<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class MyObserver implements ObserverInterface
{
    public function __construct()
    {
        // Observer initialization code...
        // You can use dependency injection to get any class this observer may need.
    }

    public function execute(Observer $observer)
    {
        $myEventData = $observer->getData('myEventData');
        $a = 1;
        // Observer execution code...
    }
}
