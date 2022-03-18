<?php


namespace App\Http\Controllers\Accounts;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Accounts\Model\Account;
use App\Domain\Accounts\Actions\AccountStoreAction;
use App\Domain\Accounts\Actions\AccountDestroyAction;
use App\Domain\Accounts\Actions\AccountUpdateAction;
use App\Domain\Accounts\DTO\AccountDTO;
use App\Http\Requests\Accounts\AccountStoreRequest;
use App\Http\Requests\Accounts\AccountUpdateRequest;
use App\Http\ViewModels\Accounts\AccountGetVM;
use App\Http\ViewModels\Accounts\AccountGetAllVM;

class AccountController extends Controller
{

    public function __construct(){
        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    /**
     * @OA\Get(
     *     path="/api/accounts",
     *     tags={"accounts"},
     *     summary="Returns all accounts",
     *     description="Returns a map of status codes to quantities",
     *     operationId="getAccounts",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function index(){

        return response()->json(Response::success((new AccountGetAllVM())->toArray()));
    }

    /**
     * @OA\Get(
     *     path="/api/accounts/1",
     *     tags={"accounts"},
     *     summary="Returns all accounts",
     *     description="Returns a map of status codes to quantities",
     *     operationId="getAccount",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function show(Account $account){

        return response()->json(Response::success((new AccountGetVM($account  ))->toArray()));
    }

    /**
     * @OA\Post(
     *     path="/api/accounts",
     *     tags={"accounts"},
     *     summary="Returns all accounts",
     *     description="Returns a map of status codes to quantities",
     *     operationId="storeAccount",
     *     @OA\RequestBody(
     *         description="order placed for purchasing th pet",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Account")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function store(AccountStoreRequest $request){

        $data = $request->validated() ;

        $accountDTO = AccountDTO::fromRequest($data);

        $account = AccountStoreAction::execute($accountDTO);

        return response()->json(Response::success((new AccountGetVM($account))->toArray()));
    }

    /**
     * @OA\Put(
     *     path="/api/accounts/1",
     *     tags={"accounts"},
     *     summary="Returns all accounts",
     *     description="Returns a map of status codes to quantities",
     *     operationId="updateAccount",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function update(Account $account, AccountUpdateRequest $request){

        $data = $request->validated() ;

        $accountDTO = AccountDTO::fromRequest($data);

        $account = AccountUpdateAction::execute($account, $accountDTO);

        return response()->json(Response::success((new AccountGetVM($account))->toArray()));
    }

    /**
     * @OA\Delete(
     *     path="/api/accounts/1",
     *     tags={"accounts"},
     *     summary="Returns all accounts",
     *     description="Returns a map of status codes to quantities",
     *     operationId="deleteAccount",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\AdditionalProperties(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function destroy(Account $account){

        return response()->json(Response::success(AccountDestroyAction::execute($account)));
    }

}
