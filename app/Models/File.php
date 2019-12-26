<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 * @property Client[] $clients
 * @property Project[] $projects
 */
class File extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file';

    /**
     * @var array
     */
    protected $fillable = ['path', 'created_at', 'updated_at'];



}
