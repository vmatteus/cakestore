<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class ViaCepTransformer
 * @package namespace App\Transformers;
 */
class CakeInterestTransformer extends TransformerAbstract
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
            'email'      => $entity->email,
            'status'     => $entity->status,
            'created_at' => $entity->created_at->format('Y-m-d')
        ];
    }

}
