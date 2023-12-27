<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject

{
    use HasFactory, Notifiable , SoftDeletes;
//    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cover','password','about_ar','about_en','country_id','city_id','state_id','username','image','phone','fcm_token','country_code'
    ];
    protected $guarded = [ 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/clients_images/' . $image);
//            return asset('uploads/admin') . '/' . $image;
        }
        return asset('defaults/user_default.png');
    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/clients_images/', $img_name, 's3');
//            $image->move(public_path('/uploads/admin/'), $img_name);
            $this->attributes['image'] = $img_name;
        }
    }


    public function getCoverAttribute($image)
    {
        if (!empty($image)) {
            return Storage::disk('s3')->url('uploads/clients_images/' . $image);
        }
        return asset('defaults/user_default.png');
    }

    public function setCoverAttribute($image)
    {
        if (is_file($image)) {
            $img_name = 'user_' . time() . random_int(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/clients_images/', $image, 's3');
//            $image->move(public_path('/uploads/clients_images/'), $img_name);
            $this->attributes['cover'] = $img_name;
        }
    }
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function Country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function City(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function State(){
        return $this->belongsTo(State::class,'state_id');
    }

    public function Products(){
        return $this->HasMany(Product::class,'user_id');
    }

    public function Rates(){
        return $this->HasMany(Rate::class,'profile_id');
    }
    public function followers(){
        return $this->HasMany(Follower::class,'profile_id');
    }
    public function Notifyfollowers(){
        return $this->HasMany(NotifyFollower::class,'profile_id');
    }
    public function is_follow($id){
        if(Auth::guard('user')->check()){
           return Follower::where('profile_id',$id)->where('user_id',Auth::guard('user')->user()->id)->count();
        }else{
            return Follower::where('profile_id',$id)->where('user_id',0)->count();
        }
    }
    public function is_Notify($id){
        if(Auth::guard('user')->check()){
            return NotifyFollower::where('profile_id',$id)->where('user_id',Auth::guard('user')->user()->id)->count();
        }else{
            return NotifyFollower::where('profile_id',$id)->where('user_id',0)->count();
        }
    }
    public function following(){
        return $this->HasMany(Follower::class,'user_id');
    }
    public function TotalRate($id){
        if(Rate::where('profile_id',$id)->count() > 0){
            $total = Rate::where('profile_id',$id)->sum('rate') / Rate::where('profile_id',$id)->count() ;
            return round($total);
        }else{
            return 5;
        }
    }

    public function verified(){
        return $this->hasOne(UserVerification::class,'user_id')->where('is_approved',1);
    }
}
