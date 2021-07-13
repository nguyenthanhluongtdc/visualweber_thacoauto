<?php

namespace Platform\Member\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Platform\ACL\Traits\SendsPasswordResetEmails;
use Platform\Member\Http\Requests\API\ForgotPasswordRequest;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Forgot password
     *
     * Send a reset link to the given user.
     *
     * @bodyParam email string required The email of the user.
     *
     * @group Authentication
     *
     * @param ForgotPasswordRequest $request
     * @return JsonResponse|RedirectResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker()
    {
        return Password::broker('members');
    }
}
