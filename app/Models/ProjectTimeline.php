<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $project_id
 * @property int $designer
 * @property int $developer
 * @property string $design_start
 * @property string $design_finish
 * @property string $development_start
 * @property string $development_finish
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 * @property Project $project
 */
class ProjectTimeline extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_timeline';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'design_start', 'design_finish', 'design_approved', 'development_start', 'development_finish', 'notes', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }


    public function designerMember()
    {
        return $this->belongsTo('App\Models\Member', 'designer');
    }

    public function developerMember()
    {
        return $this->belongsTo('App\Models\Member', 'developer');
    }

}
