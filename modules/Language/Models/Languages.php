<?php
namespace Modules\Language\Models;

use App\BaseModel;
use Illuminate\Support\Facades\Cache;

class Languages extends BaseModel
{
    protected $table = 'languages';
    protected $fillable = [
        'code',
        'name',
        'name_native',
        'dir'
    ];
}