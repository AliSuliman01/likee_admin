<?php


namespace App\Swagger\Models;

/**
 * Class Order.
 *
 * @author  Ali Suliman <alisulimanq@gmail.com>
 *
 * @OA\Schema(
 *     title="AuthUser model",
 *     description="AuthUser model",
 * )
 */

class AuthUser
{
    /**
     * @OA\Property(
     *     title="id",
     *     default=1,
     * )
     *
     * @var string
     */
    private $id;
    /**
     * @OA\Property(
     *     title="email",
     *     default="admin@test.com",
     * )
     *
     * @var string
     */
    private $email;


    /**
     * @OA\Property(
     *     title="auth_token",
     * )
     *
     * @var string
     */
    private $auth_token;
}
