<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SuperheroUniverses extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('superhero_customerbasedcheckout_superherouniverses', 'superherouniverses_id');
    }
}

