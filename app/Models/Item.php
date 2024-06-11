<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $primaryKey  = 'item_id';
    public $fillable = [ 'description',
    'cost_price',
    'sell_price',
    'image_path'];
    public function stock()
    {
        return $this->hasOne(Stock::class,'item_id');
    }
}
