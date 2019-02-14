<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LoginCreateRequest;
use App\Http\Requests\LoginUpdateRequest;
use App\Repositories\LoginRepositoryEloquent;
use App\Validators\LoginValidator;
use Helper;
use App\Entities\Login;
/**
 * Class LoginsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LoginsController extends Controller
{
    /**
     * @var LoginRepositoryEloquent
     */
    protected $repository;

    /**
     * @var LoginValidator
     */
    protected $validator;

    /**
     * LoginsController constructor.
     *
     * @param LoginRepository $repository
     * @param LoginValidator $validator
     */
    public function __construct(LoginRepositoryEloquent $repository, LoginValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $logins = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $logins,
            ]);
        }
        return view('logins.index', compact('logins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LoginCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LoginCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $login = $this->repository->create($request->all());

            $response = [
                'message' => 'Login created.',
                'data'    => $login->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $login = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $login,
            ]);
        }

        return view('logins.show', compact('login'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $login = $this->repository->find($id);

        return view('logins.edit', compact('login'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LoginUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(LoginUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $login = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Login updated.',
                'data'    => $login->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Login deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Login deleted.');
    }

    // view home page
    public function view(){
        return view('login/loginPage');
    }
    
    // search product
    public function seachPro(Request $request)
    {

    }

    // get id product
    public function getPro($id)
    {
        
    }
    // check login 
    public function checkLogin(Request $request){
        // check validate here

        // get parameter
        $user = $request->user;
        $pass =$request->pass;
        
        $passDB = $this->repository->searchUser($user);
        if(count($passDB)==0)
        {
            $data['log']='Username is not exist!';
            return view('login/loginPage',$data);
        }
        else{
            foreach($passDB as $passcheck)
            {
                $hashpass = $passcheck->password;
                // check pass by bcrypt
                if (password_verify($pass, $hashpass)) {
                    // get session
                    session(['account'=>$user]);
                    session(['money'=>24]);
                    
                    return view('home/homePage');
                }
                else{
                    $data['log']='password is incorrect!';
                    return view('login/loginPage',$data);
                }
            }
        }
    }
}
