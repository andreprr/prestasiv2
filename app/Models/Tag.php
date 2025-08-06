<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'tags';

        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'id';
        protected $fillable = ['tag'];

        protected $dates = ['created_at', 'updated_at'];
}
