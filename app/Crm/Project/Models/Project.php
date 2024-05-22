<?php

namespace Crm\Project\Models;//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    use HasFactory;
    //id project_name status customer_id project_cost created_at updated_at

    protected $fillable = [
        'project_name',
        'status',
        'customer_id',
        'project_cost',
    ];
}
