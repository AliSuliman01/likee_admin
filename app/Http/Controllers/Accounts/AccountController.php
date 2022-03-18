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
     *     summary="Returns one account by id",
     *     description="Returns a map of status codes to quantities",
     *     operationId="getAccount",
     * @OA\Response(
     *    response=200,
     *    description="added successfully",
     *    @OA\JsonContent(
     *       @OA\Property(property="isSuccessful", type="boolean", example="true"),
     *       @OA\Property(property="hasContent", type="boolean", example="true"),
     *       @OA\Property(property="code", type="integer", example="200"),
     *       @OA\Property(property="message", type="string"),
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/Account"),
     *
     *        )
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
     *     summary="Stores one account",
     *     description="Returns a map of status codes to quantities",
     *     operationId="storeAccount",
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass account credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="admin@test.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="isSuccessful", type="boolean", example="false"),
     *       @OA\Property(property="hasContent", type="boolean", example="false"),
     *       @OA\Property(property="code", type="string", example="422"),
     *       @OA\Property(property="message", type="string", example="invalid credentials"),
     *       @OA\Property(property="detailed_error", example="null"),
     *       @OA\Property(property="data", example="null"),
     *        )
     *     ),
     * @OA\Response(
     *    response=200,
     *    description="added successfully",
     *    @OA\JsonContent(
     *       @OA\Property(property="isSuccessful", type="boolean", example="true"),
     *       @OA\Property(property="hasContent", type="boolean", example="true"),
     *       @OA\Property(property="code", type="integer", example="200"),
     *       @OA\Property(property="message", type="string"),
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/Account"),
     *
     *        )
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

    public function update(Account $account, AccountUpdateRequest $request){

        $data = $request->validated() ;

        $accountDTO = AccountDTO::fromRequest($data);

        $account = AccountUpdateAction::execute($account, $accountDTO);

        return response()->json(Response::success((new AccountGetVM($account))->toArray()));
    }

    public function destroy(Account $account){

        return response()->json(Response::success(AccountDestroyAction::execute($account)));
    }

}
