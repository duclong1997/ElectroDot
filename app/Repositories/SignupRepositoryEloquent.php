<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SignupRepository;
use App\Entities\Signup;
use App\Validators\SignupValidator;
use App\Entities\Login;
/**
 * Class SignupRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SignupRepositoryEloquent extends BaseRepository implements SignupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Signup::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SignupValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    // insert account
    public function insertUser($user,$pass){
        // insert sql server
        $log = new Login();
        $options = [
            'cost' => 12,
        ];
        // set 'cost' =12
        // hash password ->database
        $password= password_hash($pass, PASSWORD_BCRYPT, $options);
        $log->username = $user;
        $log->password = $password;
        $log->save();
    }
}
