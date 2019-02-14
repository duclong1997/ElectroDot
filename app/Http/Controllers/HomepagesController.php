<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\HomepageCreateRequest;
use App\Http\Requests\HomepageUpdateRequest;
use App\Repositories\HomepageRepositoryEloquent;
use App\Validators\HomepageValidator;

/**
 * Class HomepagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class HomepagesController extends Controller
{
    /**
     * @var HomepageRepositoryEloquent
     */
    protected $repository;

    /**
     * @var HomepageValidator
     */
    protected $validator;

    /**
     * HomepagesController constructor.
     *
     * @param HomepageRepositoryEloquent $repository
     * @param HomepageValidator $validator
     */
    public function __construct(HomepageRepositoryEloquent $repository, HomepageValidator $validator)
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
        $homepages = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $homepages,
            ]);
        }

        return view('homepages.index', compact('homepages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HomepageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(HomepageCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $homepage = $this->repository->create($request->all());

            $response = [
                'message' => 'Homepage created.',
                'data'    => $homepage->toArray(),
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
        $homepage = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $homepage,
            ]);
        }

        return view('homepages.show', compact('homepage'));
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
        $homepage = $this->repository->find($id);

        return view('homepages.edit', compact('homepage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HomepageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HomepageUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $homepage = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Homepage updated.',
                'data'    => $homepage->toArray(),
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
                'message' => 'Homepage deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Homepage deleted.');
    }

     // view home page
     public function view(){
         // remove session
        //  session()->forget('account');
        //  session()->forget('money');
        return view('home/homePage');
    }
    
    // search product
    public function seachPro(Request $request)
    {

    }

    // get id product
    public function getPro($id)
    {
        
    }
}
