<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id']; // todos lso campos se pueden asignar masivamente excepto el id

    /**
     * Message belongs to Sender.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
    	// belongsTo(RelatedModel, foreignKey = sender_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class,'sender_id');
    }
}
