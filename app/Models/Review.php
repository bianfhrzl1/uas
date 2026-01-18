<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
protected $fillable = ['destination_id','name','rating','comment'];


public function destination()
{
return $this->belongsTo(Destination::class);
}
}