<?php

declare(strict_types=1);
/**
 * Plugin Google reCaptcha
 * https://github.com/torvista/Zen_Cart-Google_reCAPTCHA
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: torvista 2022 11 28
 */

/* https://developers.google.com/recaptcha/docs/verify
    invalid-input-secret	The secret parameter is invalid or malformed.
    missing-input-response	The response parameter is missing.
    invalid-input-response	The response parameter is invalid or malformed.
    bad-request	The request is invalid or malformed.
    timeout-or-duplicate	The response is no longer valid: either is too old or has been used previously
 */
define('RECAPTCHA_MISSING_INPUT_SECRET' , '入力シークレットがありません');
define('RECAPTCHA_INVALID_INPUT_SECRET' , '無効な入力シークレット');
define('RECAPTCHA_MISSING_INPUT_RESPONSE' , 'ロボットでないことを証明してください');
define('RECAPTCHA_INVALID_INPUT_RESPONSE' , '申し訳ありませんが、あなたがロボットではないことをもう一度証明してください');
define('RECAPTCHA_BAD_REQUEST' , 'reCaptcha: リクエストが無効であるか、形式が正しくありません');
define('RECAPTCHA_TIMEOUT_OR_DUPLICATE' , 'reCaptcha: タイムアウトまたは重複リクエスト');
