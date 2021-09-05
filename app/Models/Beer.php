<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Beer extends Model
{
    use HasFactory;

    use Sortable;

    public $sortable = [
        'beer',
        'rating',
        'country',
        'type'
    ];

    public function list()
    {
        return $this->belongsToMany(BeerList::class, 'beer_list_pivot', 'beer_id', 'list_id');
    }
}
