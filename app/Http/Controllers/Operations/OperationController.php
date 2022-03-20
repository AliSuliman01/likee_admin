<?php


namespace App\Http\Controllers\Operations;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Operations\Model\Operation;
use App\Domain\Operations\Actions\OperationStoreAction;
use App\Domain\Operations\Actions\OperationDestroyAction;
use App\Domain\Operations\Actions\OperationUpdateAction;
use App\Domain\Operations\DTO\OperationDTO;
use App\Http\ViewModels\Operations\OperationGetVM;
use App\Http\ViewModels\Operations\OperationGetAllVM;

class OperationController extends Controller
{

    public function __construct(){
        $this->middleware('datatable_adapter')->only(['index']);
        $this->middleware('auth')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new OperationGetAllVM())->toArray()));
    }

    public function show(Operation $operation){

        return response()->json(Response::success((new OperationGetVM($operation  ))->toArray()));
    }

    public function update(Operation $operation, OperationUpdateRequest $request){

        $data = $request->validated() ;

        $operationDTO = OperationDTO::fromRequest($data);

        $operation = OperationUpdateAction::execute($operation, $operationDTO);

        return response()->json(Response::success((new OperationGetVM($operation))->toArray()));
    }

}
