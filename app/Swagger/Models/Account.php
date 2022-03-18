<?php


namespace App\Swagger\Models;

/**
 * Class Order.
 *
 * @author  Ali Suliman <alisulimanq@gmail.com>
 *
 * @OA\Schema(
 *     title="Account model",
 *     description="Account model",
 * )
 */

class Account
{
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
     *     title="phone_number",
     *     default="0966666666"
     * )
     *
     * @var string
     */
    private $phone_number;

    /**
     * @OA\Property(
     *     title="password",
     *     default="123456"
     * )
     *
     * @var string
     */
    private $password;
}
