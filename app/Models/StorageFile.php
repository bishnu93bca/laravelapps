<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageFile extends Model
{
    use HasFactory;

    protected $table = 'storage_files';

    protected $fillable = [
        'type',
        'parent_type',
        'parent_id',
        'user_id',
        'service_id',
        'storage_path',
        'extension',
        'name',
        'mime_major',
        'mime_minor',
        'size',
    ];

    // Relationships
    // public function parentFile()
    // {
    //     return $this->belongsTo(self::class, 'parent_file_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }
}
