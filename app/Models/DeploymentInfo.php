<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property string $domain
 * @property string $cpanel_url
 * @property string $cpanel_username
 * @property string $cpanel_password
 * @property string $dashboard_url
 * @property string $dashboard_username
 * @property string $dashboard_password
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 */
class DeploymentInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deployment_info';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'domain', 'cpanel_url', 'cpanel_username', 'cpanel_password', 'dashboard_url', 'dashboard_username', 'dashboard_password', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
