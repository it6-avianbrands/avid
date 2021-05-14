<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccount extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'UserAccount';

    protected $primaryKey = 'Username';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username',
        'Nama',
        'Password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'RememberToken',
    ];

    // Override required, otherwise existing Authentication system will not match credentials
    public function getAuthPassword()
    {
        return $this->Password;
    }

    // Override required, otherwise existing Authentication system will not match credentials
    public function getRememberToken()
    {
        return $this->RememberToken;
    }

    // Override required, otherwise existing Authentication system will not match credentials
    public function setRememberToken($value)
    {
        $this->RememberToken = $value;
    }

    // Override required, otherwise existing Authentication system will not match credentials
    public function getRememberTokenName()
    {
        return 'RememberToken';
    }
}
