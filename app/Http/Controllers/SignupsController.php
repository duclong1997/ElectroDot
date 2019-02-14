<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SignupCreateRequest;
use App\Http\Requests\SignupUpdateRequest;
use App\Repositories\SignupRepositoryEloquent;
use App\Validators\SignupValidator;

/**
 * Class SignupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SignupsController extends Controller
{
    /**
     * @var SignupRepositoryEloquent
     */
    protected $repository;

    /**
     * @var SignupValidator
     */
    protected $validator;

    /**
     * SignupsController constructor.
     *
     * @param SignupRepositoryEloquent $repository
     * @param SignupValidator $validator
     */
    public function __construct(SignupRepositoryEloquent $repository, SignupValidator $validator)
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
        $signups = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $signups,
            ]);
        }

        return view('signups.index', compact('signups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SignupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SignupCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $signup = $this->repository->create($request->all());

            $response = [
                'message' => 'Signup created.',
                'data'    => $signup->toArray(),
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
        $signup = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $signup,
            ]);
        }

        return view('signups.show', compact('signup'));
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
        $signup = $this->repository->find($id);

        return view('signups.edit', compact('signup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SignupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SignupUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $signup = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Signup updated.',
                'data'    => $signup->toArray(),
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
                'message' => 'Signup deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Signup deleted.');
    }

    // view sign up
    public function view(){
        return view('signup/signupPage');
    }
    // register
    public function register(Request $request){
        // check vaildate here
        $pass =$request->pass;
        $user =$request->user;
        // insert account in database
        $this->repository->insertUser($user,$pass);
        return view('login/loginPage');
    }

}
