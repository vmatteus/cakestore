<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class ViaCepTransformer
 * @package namespace App\Transformers;
 */
class CakeStockTransformer extends TransformerAbstract
{
    /**
     * Transform an address
     *
     * @param array $address Array containing the ViaCep address
     *
     * @return array
     */
    public function transform($entity)
    {
        return [
            'id'         => $entity->id,
            'cake_id'    => $entity->cake_id,
            'weight'     => $entity->weight,
            'price'      => $entity->price,
            'status'     => $entity->status,
            'created_at' => $entity->created_at->format('Y-m-d')
        ];
    }

}
