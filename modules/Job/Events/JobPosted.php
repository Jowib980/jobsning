<?php
namespace Modules\Job\Events;

use Illuminate\Queue\SerializesModels;

class JobPosted
{
    use SerializesModels;
    public $row;

    public function __construct($row)
    {
        $this->row = $row;
    }
}
