<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOffenseFile extends Model
{
    use HasFactory;

    protected $table = 'student_offense_files';

    protected $primaryKey = 'id';

    protected $fillable = ['offense_id','file_name'];

    public function Offense(){
        return $this->belongsTo(StudentOffense::class);
    }
}
