<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Http\Controllers\Response;
use CodeFin\Http\Requests;
use CodeFin\Http\Requests\BankAccountCreateRequest;
use CodeFin\Http\Requests\BankAccountUpdateRequest;
use CodeFin\Repositories\Interfaces\BankAccountRepository;
use Illuminate\Http\Request;


class BankAccountsController extends Controller
{

    /**
     * @var BankAccountRepository
     */
    protected $repository;


    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function lists()
    {
        return $this->repository->skipPresenter()->all(['id','name','account']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = (int)$request->get('limit', null);
        $limit = $limit > 0 ? $limit : null;
        return $this->repository->paginate($limit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankAccountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {
        $bankAccount = $this->repository->create($request->all());
        return response()->json($bankAccount, 201);
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
        $bankAccount = $this->repository->find($id);
        return response()->json($bankAccount, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BankAccountUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {
        $bankAccount = $this->repository->update($request->all(), $id);
        return response()->json($bankAccount, 200);
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
        $this->repository->delete($id);
        return response()->json([], 204);
    }
}
