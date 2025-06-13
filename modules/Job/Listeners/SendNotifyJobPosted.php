<?php

    namespace Modules\Job\Listeners;

    use App\Notifications\PrivateChannelServices;
    use Modules\Job\Events\JobPosted;
    use Modules\User\Models\User;

    class SendNotifyJobPosted
    {

        public function handle(JobPosted $event)
        {
            $row = $event->row;
            $user = User::find($row->candidate_id);
            if(!empty($user)) {
                $user->notify(new NewJobPosted($row));
            }
        }
    }
