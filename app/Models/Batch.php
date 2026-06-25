<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batche';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'course_id',
        'start_date',
        'end_date',
        'time'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
