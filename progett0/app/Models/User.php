<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getId(){return $this->attributes['id'];}
    public function setId($id){$this->attributes['id'] = $id;}

    public function getName(){return $this->attributes['name'];}
    public function setName($name){$this->attributes['name'] = $name;}

    public function getEmail(){return $this->attributes['email'];}
    public function setEmail($email){$this->attributes['email'] = $email;}

    public function getPassword(){return $this->attributes['password'];}
    public function setPassword($password){$this->attributes['password'] = $password;}

    public function getRole(){return $this->attributes['role'];}
    public function setRole($role){$this->attributes['role'] = $role;}

    public function getBalance(){return $this->attributes['balance'];}
    public function setBalance($balance){$this->attributes['balance'] = $balance;}

    public function getCreatedAt(){return $this->attributes['created_At'];}
    public function setCreatedAt($createdAt){$this->attributes['created_At'] = $createdAt;}

    public function getUpdateAt(){return $this->attributes['updated_At'];}
    public function setUpdateAt($updateAt){$this->attributes['update_At'] = $updateAt;}


    public function orders(): HasMany{
        return $this->hasMany(Order::class);
    }
    public function gerOrders(){
        return $this->orders;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
