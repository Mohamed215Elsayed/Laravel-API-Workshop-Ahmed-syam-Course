<?php

namespace Crm\Customer\Models;//

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // id name created_at updated_at
    protected $fillable = ['name'];
    public function getIdAttribute($value)
    {
        return (int) $value;
    }
}
