<?php


namespace App\Http\Requests\Requests;


use App\Http\Requests\ApiFormRequest;

class RequestUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'operation_id' 					=> 'required|exists:operations,id,deleted_at,NULL' ,
            'post_url' 					=> 'required|string' ,
            'user_type' 					=> 'required|integer' ,
            'requested_amount' 					=> 'required|integer' ,
            'requested_comment' 					=> 'nullable|string' ,
            'number_of_page_posts' 					=> 'nullable|integer' ,
        ];
    }
}
