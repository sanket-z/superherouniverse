<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Model;

use Magento\Framework\Model\AbstractModel;
use Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface;

class SuperheroUniverses extends AbstractModel implements SuperheroUniversesInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Superhero\CustomerBasedCheckout\Model\ResourceModel\SuperheroUniverses::class);
    }

    /**
     * @inheritDoc
     */
    public function getSuperherouniversesId()
    {
        return $this->getData(self::SUPERHEROUNIVERSES_ID);
    }

    /**
     * @inheritDoc
     */
    public function setSuperherouniversesId($superherouniversesId)
    {
        return $this->setData(self::SUPERHEROUNIVERSES_ID, $superherouniversesId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getTotalOrderCount()
    {
        return $this->getData(self::TOTAL_ORDER_COUNT);
    }

    /**
     * @inheritDoc
     */
    public function setTotalOrderCount($totalOrderCount)
    {
        return $this->setData(self::TOTAL_ORDER_COUNT, $totalOrderCount);
    }
}

