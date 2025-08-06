<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

        /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'group_classes';

        /**
         * The primary key associated with the table.
         *
         * @var string
         */
        protected $primaryKey = 'id';

        protected $dates = ['created_at', 'updated_at', 'deleted_at'];

        public function general()
        {
            return $this->belongsTo(GeneralGroup::class,'general_id','id');
        }
}
