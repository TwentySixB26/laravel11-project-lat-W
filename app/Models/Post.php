<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['author','category'] ; 

    //nama method nya bebas dan belongsTo adalah hubungan nya, karena tabel post mengambil data dari user dan hubunganya adalah one to manny 
    public function author():BelongsTo{
        return $this->belongsTo(User::class) ; 
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class) ; 
    }

    //builder dan $query adalah parameter yang sudah disediakan laravel,tidak bisa diubah atau diganti 
    public function scopeFilter(Builder $query, array $filters): void {
        
        $query->when($filters['search'] ?? false , function($query,$search){
            $query->where(function($query) use($search){
                $query->where('title','like' , '%' . $search . '%' ) 
                    ->orWhere('body', 'like', '%' . $search . '%');
            }) ; 
        }) ; 

        $query->when($filters['category'] ?? false , function($query,$category){
            //'category' pada whereHas('category' , function....) itu diambil berdasarkan nama relasinya 
            $query->whereHas('category', function($query) use($category){
                $query->where('slug', $category) ;
            }) ;
        }) ; 

        $query->when($filters['author'] ?? false , function($query,$author){
            //'category' pada whereHas('category' , function....) itu diambil berdasarkan nama relasinya 
            $query->whereHas('author', function($query) use($author){
                $query->where('username', $author) ;
            }) ;
        }) ; 

    }
    
}


