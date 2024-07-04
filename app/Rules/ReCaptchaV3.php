<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptchaV3 implements Rule
{
    private ?string $action;
    private ?float $minScore;

    public function __construct(?string $action = null, ?float $minScore = null)
    {
        $this->action = $action;
        $this->minScore = $minScore;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Send a POST request to the Google siteverify service to validate the reCAPTCHA response
        $siteVerify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha_v3.secret'),
            'response' => $value,
        ]);

        // This happens if Google denied our request with an error
        if ($siteVerify->failed()) {
            return false;
        }

        // This means Google successfully processed our POST request. We still need to check the results!
        $body = $siteVerify->json();

        // When this fails it means the browser didn't send a correct code. This means it's very likely a bot we should block
        if ($body['success'] !== true) {
            return false;
        }

        // When this fails it means the action didn't match the one set in the button's data-action.
        // Either a bot or a code mistake. Compare form data-action and value passed to $action (should be equal).
        if (!is_null($this->action) && $this->action != $body['action']) {
            return false;
        }

        // If we set a minScore threshold, verify that the spam score didn't go below it
        // More info can be found at: https://developers.google.com/recaptcha/docs/v3#interpreting_the_score
        if (!is_null($this->minScore) && $this->minScore > $body['score']) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Google reCAPTCHA verification failed, please try again.';
    }
}
