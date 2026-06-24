<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollment;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'enrollment_ids',
        'payment_no',
        'amount',
        'payment_date',
        'method',
        'remarks'
    ];
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
    
    
}