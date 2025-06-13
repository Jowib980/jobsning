<?php
namespace Modules\Candidate\Models;

use App\BaseModel;
use Modules\Media\Helpers\FileHelper;
use Modules\Media\Models\MediaFile;

class Resume extends BaseModel
{
	protected $table = 'resumes';

    protected $fillable = [
    	'first_name',
    	'last_name',
    	'profile_picture',
        'profile_title',
    	'about',
    	'email',
    	'phone',
    	'linkedin',
    	'github',
    	'twitter',
    	'website',
    	'experience_type',
    	'education',
    	'experience',
    	'skills',
    	'projects',
    	'languages'
    ];


    public function profilePicture()
    {
        return $this->belongsTo(MediaFile::class, 'profile_picture');
    }

    public function getThumbnailUrl(){
        if(!empty($this->profile_picture)){
            return FileHelper::url($this->profile_picture);
        } elseif(!empty($this->user)){
            return $this->user->getAvatarUrl();
        } else{
            return false;
        }
    }
}