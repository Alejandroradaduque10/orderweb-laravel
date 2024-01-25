<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activity';
    protected $fillable = [
        'description',
        'hours',
        'technician_id',
        'type_id'
];

/**
 * se debe colocar el nombre de la FK ya que está hace referencias al
 * campo decument  de technician y por llamarse deiferente a 'id'
 * debe espesificarse manualmente
 */

public function technician()

{
    return$this->belongsTo(Technician::class, 'technician_id' );

}
    public function type_activity()
        {
            return $this->belongsTo(TypeActivity::class);
        }

        public function orders()
        {
            return $this->belongsToMany(Order::class, 'order_activity',
            'order_id','activity_id');
        }
}
