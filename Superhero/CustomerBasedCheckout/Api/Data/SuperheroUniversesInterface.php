<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Api\Data;

interface SuperheroUniversesInterface
{

    const SUPERHEROUNIVERSES_ID = 'superherouniverses_id';
    const NAME = 'name';
    const TOTAL_ORDER_COUNT = 'total_order_count';

    /**
     * Get superherouniverses_id
     * @return string|null
     */
    public function getSuperherouniversesId();

    /**
     * Set superherouniverses_id
     * @param string $superherouniversesId
     * @return \Superhero\CustomerBasedCheckout\SuperheroUniverses\Api\Data\SuperheroUniversesInterface
     */
    public function setSuperherouniversesId($superherouniversesId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Superhero\CustomerBasedCheckout\SuperheroUniverses\Api\Data\SuperheroUniversesInterface
     */
    public function setName($name);

    /**
     * Get total_order_count
     * @return string|null
     */
    public function getTotalOrderCount();

    /**
     * Set total_order_count
     * @param string $totalOrderCount
     * @return \Superhero\CustomerBasedCheckout\SuperheroUniverses\Api\Data\SuperheroUniversesInterface
     */
    public function setTotalOrderCount($totalOrderCount);
}

