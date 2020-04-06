<?php
namespace Modules\Todo\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use Filterable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}