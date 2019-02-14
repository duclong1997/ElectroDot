<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Signup;

/**
 * Class SignupTransformer.
 *
 * @package namespace App\Transformers;
 */
class SignupTransformer extends TransformerAbstract
{
    /**
     * Transform the Signup entity.
     *
     * @param \App\Entities\Signup $model
     *
     * @return array
     */
    public function transform(Signup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
