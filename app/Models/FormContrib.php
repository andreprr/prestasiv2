<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormContrib extends Model
{
    use HasFactory;

    /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'form_contribs';

        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'id';
        
        protected $fillable = ['form_id','contributor'];

        protected $dates = ['created_at', 'updated_at'];
}
