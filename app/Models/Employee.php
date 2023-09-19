<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false; //đặt bên dưới có thể nó lấy thêm timecreate_at và update_at
    use HasFactory;
    protected $table='employees';
    protected $primaryKey='EMP_ID';

}
