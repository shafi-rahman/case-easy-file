<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProfileModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'user_id', 
        'first_name', 
        'middle_name',
        'last_name',
        'email_id',
        'mobile_number',
        'date_of_birth',
        'gender',
        'marital_status',
        'dependents',
        'address',
        'countries',
        'states',
        'cities',
        'pin_code'
    ];
}
