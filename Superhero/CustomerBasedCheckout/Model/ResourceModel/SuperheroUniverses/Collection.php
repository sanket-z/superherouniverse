<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Model\ResourceModel\SuperheroUniverses;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'superherouniverses_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Superhero\CustomerBasedCheckout\Model\SuperheroUniverses::class,
            \Superhero\CustomerBasedCheckout\Model\ResourceModel\SuperheroUniverses::class
        );
    }
}

