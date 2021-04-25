<?php

namespace App\Repositories;

use App\Models\Delivery;

class DeliveryRepository
{
    /**
     * @var Delivery
     */
    private $delivery;

    /**
     * Class constructor method.
     *
     * @param Delivery $delivery
     */
    public function __construct(
        Delivery $delivery
    ) {
        $this->delivery = $delivery;
    }

    public function create(object $data)
    {
        $delivery = $this->delivery->create([
            'name'    => $data->name,
            'date'    => $data->date,
            'match'   => $data->match,
            'destiny' => $data->destiny
        ]);

        return $delivery;
    }

    public function getDeliveries()
    {
        return $this->delivery->get();
    }

    public function getDeliveryById(Int $deliveryId)
    {
        return $this->delivery->where('id', $deliveryId)->first();
    }

}
