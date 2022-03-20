<?php


namespace App\Http\Controllers\Users;


use App\Helpers\Response;
use App\Http\Requests\Users\UserLoginRequest;
use App\Http\Requests\Users\UserSignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController
{

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Auth"},
     *     summary="login by email",
     *     description="Returns an auth token",
     *     operationId="Login",
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="admin@test.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
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
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/AuthUser"),
     *
     *        )
     *     ),
     *     security={
     *         {"api_key": {}}
     *     }
     * )
     */
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        /** @var User $user */
        $user = User::query()->where('email','=',$data['email'])->first();
        if(Hash::check($data['password'], $user->password)){
            $user->update(['api_token' => Str::random(60)]);
            return response()->json(Response::success($user));
        }
        return response()->json(Response::error("invalid credentials.",null,422),422);
    }
    public function signup(UserSignupRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        /** @var User $user */
        $user = User::query()->create($data + [
            'api_token' => Str::random(60)
            ]);
        return response()->json($user);
    }
}
