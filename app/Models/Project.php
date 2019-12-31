<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
 * @property int $contract_id
 * @property int $content_id
 * @property int $sales_man_id
 * @property int $status_id
 * @property string $name
 * @property string $description
 * @property string $domain
 * @property string $created_at
 * @property string $updated_at
 * @property Client $client
 * @property Status $status
 * @property Status $project_type
 * @property ProjectTimeline[] $projectTimelines
 */
class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';

    /**
     * @var array
     */
    protected $fillable = ['client_id', 'contract_id', 'content_id', 'sales_man_id', 'status_id', 'name', 'description', 'domain', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo('App\Models\File', 'content_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo('App\Models\File', 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'sales_man_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectTimelines()
    {
        return $this->hasMany('App\Models\ProjectTimeline');
    }

}
