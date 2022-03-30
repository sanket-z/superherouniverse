<?php

declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class AddSuperheroUniversesToOrder implements ObserverInterface
{    
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $order->setData(
            'superhero_universes',
            $quote->getData('superhero_universes')
        );       
    }
}