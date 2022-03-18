<?php


namespace App\Http\Controllers\Requests;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Requests\Model\Request;
use App\Domain\Requests\Actions\RequestStoreAction;
use App\Domain\Requests\Actions\RequestDestroyAction;
use App\Domain\Requests\Actions\RequestUpdateAction;
use App\Domain\Requests\DTO\RequestDTO;
use App\Http\Requests\Requests\RequestStoreRequest;
use App\Http\Requests\Requests\RequestUpdateRequest;
use App\Http\ViewModels\Requests\RequestGetVM;
use App\Http\ViewModels\Requests\RequestGetAllVM;

class RequestController extends Controller
{

    public function __construct(){
        $this->middleware('datatable_adapter')->only(['index']);
        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new RequestGetAllVM())->toArray()));
    }

    public function show(Request $request){

        return response()->json(Response::success((new RequestGetVM($request  ))->toArray()));
    }

    public function store(RequestStoreRequest $request){

        $data = $request->validated() ;

        $requestDTO = RequestDTO::fromRequest($data);

        $request = RequestStoreAction::execute($requestDTO);

        return response()->json(Response::success((new RequestGetVM($request))->toArray()));
    }

    public function update(Request $request, RequestUpdateRequest $updateRequest){

        $data = $updateRequest->validated() ;

        $requestDTO = RequestDTO::fromRequest($data);

        $request = RequestUpdateAction::execute($request, $requestDTO);

        return response()->json(Response::success((new RequestGetVM($request))->toArray()));
    }

    public function destroy(Request $request){

        return response()->json(Response::success(RequestDestroyAction::execute($request)));
    }

}
