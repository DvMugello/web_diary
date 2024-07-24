<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $guarded= ['id'];

    protected $with =['user'];

    public static function last()
    {
        return static::all()->last();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateFormatAttribute(){

     return Carbon::parse($this->date)->isoFormat('DD-MM-YYYY');
    }

}
