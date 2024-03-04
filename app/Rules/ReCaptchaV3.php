<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptchaV3 implements Rule
{
    /**
     * @param string|null $action
     * @param float|null $minScore
     */
    public function __construct(
        private ?string $action = null,
        private ?float $minScore = null
    ) {
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        // Send a POST request to the google siteverify service to validate the
        $siteVerify = Http::asForm()
            ->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha_v3.secretKey'),
                'response' => $value,
            ]);

        // This happens if google denied our request with an error
        if ($siteVerify->failed()) {
            return false;
        }

        // This means Google successfully processed our POST request. We still need to check the results!
        if ($siteVerify->successful()) {
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

            // If we set a minScore treshold, verify that the spam score didn't go below it
            // More info can be found at: https://developers.google.com/recaptcha/docs/v3#interpreting_the_score
            if (!is_null($this->minScore) && $this->minScore > $body['score']) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'Google ReCAPTCHA failed!';
    }
}
