<?php

namespace App\Presenters;

use App\Transformers\SignupTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SignupPresenter.
 *
 * @package namespace App\Presenters;
 */
class SignupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SignupTransformer();
    }
}
