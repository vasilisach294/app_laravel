<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use App\Models\Product;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function cart() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')->withPivot('amount');
    }

    public function addToCart($product_id)
    {
        $productAmount = 0;

        foreach($this->cart()->get() as $product)
        {    
            if($product->id == $product_id)
            {
                $productAmount = $product->pivot->amount;
            }
        }

        $this->cart()->syncWithoutDetaching([$product_id => ['amount' => $productAmount + 1]]);
    }
}
