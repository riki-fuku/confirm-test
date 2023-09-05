<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public function scopeFullnameSearch($query, $fullname)
    {
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%' . $fullname . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender) && $gender != 0) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCreatedStartSearch($query, $createdStart)
    {
        if (!empty($createdStart)) {
            $query->where('created_at', '>=',  $createdStart);
        }
    }

    public function scopeCreatedEndSearch($query, $createdEnd)
    {
        if (!empty($createdEnd)) {
            $query->where('created_at', '<=',  $createdEnd);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
            $query->where('email', $email);
        }
    }
}
