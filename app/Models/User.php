<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded=['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public static function last()
    {
        return static::all()->last();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getGetRoleAttribute()
    {
        return $this->getRoleNames()->first();
    }
    public function getPhoto($bg = 'F98502', $color = 'FFF')
    {
        $buildQueryString = str_replace(' ', '+', $this->name);
        $mediaItems = $this->getFirstMediaUrl('avatar');
        $imgDefault = "https://ui-avatars.com/api/?background=$bg&color=$color&name={$buildQueryString}";

        if ($mediaItems) {
            return $mediaItems;
        } else {
            return $imgDefault;
        }
    }
}
