<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Tự động tạo slug từ name
    

    // Quan hệ với danh mục cha
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ với danh mục con
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Lấy tất cả danh mục con (đệ quy)
    public function allChildren(): HasMany
    {
        return $this->children()->with('allChildren');
    }

    // Scope: Chỉ lấy danh mục active
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: Chỉ lấy danh mục cha (root)
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Lấy breadcrumb path
    public function getBreadcrumb(): array
    {
        $breadcrumb = [$this->name];
        $parent = $this->parent;

        while ($parent) {
            array_unshift($breadcrumb, $parent->name);
            $parent = $parent->parent;
        }

        return $breadcrumb;
    }
}