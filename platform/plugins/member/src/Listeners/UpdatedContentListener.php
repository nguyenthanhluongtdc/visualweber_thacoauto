<?php

namespace Platform\Member\Listeners;

use Platform\Base\Events\UpdatedContentEvent;
use Platform\Member\Models\Member;
use Platform\Member\Repositories\Interfaces\MemberActivityLogInterface;
use Exception;

class UpdatedContentListener
{
    /**
     * Handle the event.
     *
     * @param UpdatedContentEvent $event
     * @return void
     */
    public function handle(UpdatedContentEvent $event)
    {
        try {
            if ($event->data->id &&
                $event->data->author_type === Member::class &&
                auth('member')->check() &&
                $event->data->author_id == auth('member')->user()->getAuthIdentifier()
            ) {
                app(MemberActivityLogInterface::class)->createOrUpdate([
                    'action'         => 'your_post_updated_by_admin',
                    'reference_name' => $event->data->name,
                    'reference_url'  => route('public.member.posts.edit', $event->data->id),
                ]);
            }
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
