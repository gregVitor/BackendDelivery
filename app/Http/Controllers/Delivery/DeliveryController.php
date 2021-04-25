<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\DeliveryRepository;

class DeliveryController extends Controller
{
    /**
     * @var DeliveryRepository
     */
    private $deliveryRepository;

    /**
     * Class constructor method.
     *
     * @param deliveryRepository $deliveryRepository
     * @param AuthValidator $authValidator
     */
    public function __construct(
        DeliveryRepository $deliveryRepository
    ) {
        $this->deliveryRepository = $deliveryRepository;
    }

    public function create(Request $request)
    {
        try {
            $data = [
                'name'    => $request->name,
                'date'    => $request->date,
                'match'   => $request->match,
                'destiny' => $request->destiny
            ];

            $delivery = $this->deliveryRepository->create($data);

            return apiResponse("Entrega criada com sucesso", 200, $delivery);
        } catch (\Exception $e) {
            throw ($e);
        }

    }

    public function getDeliveries()
    {
        try {
            $deliveries = $this->deliveryRepository->getDeliveries();

            return apiResponse("Ok", 200, $deliveries);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

    public function getDelivery(Int $deliveryId)
    {
        try {
            $delivery = $this->deliveryRepository->getDelivery($deliveryId);

            return apiResponse("Ok", 200, $delivery);
        } catch (\Exception $e) {
            throw ($e);
        }
    }

}
