<?php

namespace App\Domain\Requests\Model;

use App\Domain\Operations\Model\Operation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'deleted_at'
    ];
    protected $guarded = [];

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
