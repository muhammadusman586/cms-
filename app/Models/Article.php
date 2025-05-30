<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Article extends Model
{

    use HasFactory;

    protected $fillable = [
        'image',
        'postdate',
        'title',
        'content',
        'author_id',
        'category_id',

    ];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
