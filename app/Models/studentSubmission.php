<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentSubmission extends Model
{
    use HasFactory;

    protected $table='student_submission';

    protected $fillable = ['student_id','puzzle_id','word','score'];

    public function Student(){

        return $this->belongsTo(Students::class);

    }

    public function Puzzles(){

        return $this->belongsTo(Puzzles::class);
        
    }
}
