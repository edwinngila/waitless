<?php

namespace App\Models;

use App\Models\Admin\ActiveUsers;
use App\Models\Admin\ActiveTickets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AudioFile extends Model
{
    use HasFactory;

    public $fillable = [
        'file_name',
        'file_path',
    ];

    protected $casts = [
        'file_name' => 'string',
        'file_path' => 'string',
    ];

    public static array $rules = [
        'file_name' => 'required',
        'file_path' => 'required',
    ];

    public function activeTickets()
    {
        return $this->hasMany(ActiveTickets::class, 'audio_id');
    }
}
