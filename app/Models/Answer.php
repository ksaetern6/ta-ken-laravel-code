<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
    ];

    public $timestamps = false;

   /**
     */
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
