<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Reserve extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'client_id', 'car_id', 'start_date', 'end_date', 'total_amount', 'resource', 'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
