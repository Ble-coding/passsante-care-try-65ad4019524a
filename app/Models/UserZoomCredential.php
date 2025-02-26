<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserZoomCredential
 *
 * @property int $id
 * @property int $user_id
 * @property string $zoom_api_key
 * @property string $zoom_api_secret
 * @property string $zoom_api_account
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereZoomApiKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserZoomCredential whereZoomApiSecret($value)
 *
 * @mixin \Eloquent
 */
class UserZoomCredential extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'zoom_api_key' => 'required',
        'zoom_api_secret' => 'required',
        'zoom_api_account' => 'required',
    ];

    protected $table = 'user_zoom_credential';

    protected $fillable = [
        'user_id',
        'zoom_api_key',
        'zoom_api_secret',
        'zoom_api_account'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'zoom_api_key' => 'string',
        'zoom_api_secret' => 'string',
        'zoom_api_account'=> 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
