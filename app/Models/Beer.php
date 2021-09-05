<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->belongsToMany(BeerList::class, 'beer_list_pivot', 'beer_id', 'list_id');
    }
}
