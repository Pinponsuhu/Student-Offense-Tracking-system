<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOffense extends Model
{
    use HasFactory;

    protected $table = 'student_offenses';

    protected $primaryKey = 'id';

    protected $fillable = ['remark','reported_by','student_id'];

    public function OffenseFile(){
        return $this->hasMany(StudentOffenseFile::class);
    }

}
