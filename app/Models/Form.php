<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'forms';

        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'id';

        protected $dates = ['created_at', 'updated_at', 'deleted_at'];

        protected $casts = [
            'contributor' => 'array',
            'tag' => 'array'
        ];
}
