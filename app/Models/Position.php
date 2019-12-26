<?php

namespace AppModels;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent_position
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property Position $position
 * @property Member[] $members
 */
class Position extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'position';

    /**
     * @var array
     */
    protected $fillable = ['parent_position', 'title', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'parent_position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany('App\Models\Member');
    }
}
