<?php

namespace Superhero\CustomerBasedCheckout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

class SaveSuperheroUniverses implements ObserverInterface
{
    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Superhero\CustomerBasedCheckout\Model\SuperheroUniversesFactory $superheroUniversesFactory,
        \Superhero\CustomerBasedCheckout\Model\SuperheroUniverses $superheroUniverses
    )
    {
        $this->superheroUniversesFactory = $superheroUniversesFactory;
        $this->superheroUniverses = $superheroUniverses;
    }

    public function execute(Observer $observer)
    {
       /** @var OrderInterface $order */
        $order = $observer->getEvent()->getOrder();
        $orderId = $order->getEntityId();
        $superhero_universes = $order->getData('superhero_universes');

        $process = $this->superheroUniverses->load($superhero_universes,'name');
        if ($process->getData()) {
            $this->superheroUniverses->setTotalOrderCount($process->getTotalOrderCount() + 1)->save();
        } else {
            $this->superheroUniverses->setName($superhero_universes)->setTotalOrderCount(1)->save();
        }
    }
}