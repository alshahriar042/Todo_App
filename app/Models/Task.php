<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $table = 'tasks';

    protected $fillable=[
        'name',
        'description',
        'ending_time',
        'user_id'

        ];
    protected $hidden=[
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(Task::class);
    }
}
