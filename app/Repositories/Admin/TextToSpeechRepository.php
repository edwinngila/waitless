<?php

namespace App\Repositories\Admin;

use App\Models\AudioFile;
use App\Models\Admin\Ticket;
use App\Repositories\BaseRepository;

class TextToSpeechRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'file_name',
        'file_path',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AudioFile::class;
    }
}
