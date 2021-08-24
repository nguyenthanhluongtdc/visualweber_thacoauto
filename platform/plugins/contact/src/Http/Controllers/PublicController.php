<?php

namespace Platform\Contact\Http\Controllers;

use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Contact\Events\SentContactEvent;
use Platform\Contact\Http\Requests\ContactRequest;
use Platform\Contact\Repositories\Interfaces\ContactInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    /**
     * @var ContactInterface
     */
    protected $contactRepository;

    /**
     * @param ContactInterface $contactRepository
     */
    public function __construct(ContactInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param ContactRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postSendContact(ContactRequest $request, BaseHttpResponse $response)
    {

        // if($request->has('firstname') && $request->has('lastname')){
        //     $request->request->add(['name' =>$request->firstname. ' ' .$request->lastname]);
        //     $request->request->remove('firstname');
        //     $request->$request->remove('lastname');
        // }
        try {
            $contact = $this->contactRepository->getModel();
            $contact->fill($request->input());
            $contact_name = $contact->firstname . " " . $contact->lastname;
            $this->contactRepository->createOrUpdate($contact);

            event(new SentContactEvent($contact));

            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'contact_name'    => $contact_name ?? 'N/A',
                    'contact_subject' => $contact->subject ?? 'N/A',
                    'contact_email'   => $contact->email ?? 'N/A',
                    'contact_phone'   => $contact->phone ?? 'N/A',
                    'contact_address' => $contact->address ?? 'N/A',
                    'contact_content' => $contact->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');
            return $response->setMessage(__('Send message successfully!'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(__('Can\'t send message on this time, please try again later!'));
        }
    }
}
