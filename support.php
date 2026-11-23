<?php
$currentPage = 'support';
$pageTitle = 'Support | DJM Tool';
$pageDescription = 'Contact the DJM Tool team for product questions and support.';
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$message = '';
$captchaResponse = '';

/* 
 * I have removed the accidental space at the start of the Secret Key.
 * NOTE: These are still v3 keys. If you see "Invalid key type" on the frontend,
 * you MUST generate new v2 Checkbox keys from Google.
 */
$recaptchaSiteKey = '6Le3PR4uAAAAAGzDctIIjiRMxpspDz968DWvjEYI';
$recaptchaSecretKey = '6Le3PR4uAAAAAJrTCxS4KotSU5w_wn4LB4yUxyoy';

// This correctly checks if the keys are empty or still the default placeholders
$recaptchaConfigured = $recaptchaSiteKey !== '' 
                    && $recaptchaSecretKey !== '';

$errors = [];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim((string) ($_POST['first_name'] ?? ''));
    $lastName = trim((string) ($_POST['last_name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));
    $captchaResponse = trim((string) ($_POST['g-recaptcha-response'] ?? ''));
    
    $length = static function (string $value): int {
        return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
    };

    if ($firstName === '' || $length($firstName) > 100) {
        $errors[] = 'Please enter your first name (up to 100 characters).';
    }
    if ($lastName === '' || $length($lastName) > 100) {
        $errors[] = 'Please enter your last name (up to 100 characters).';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $length($email) > 254) {
        $errors[] = 'Please enter a valid email address (up to 254 characters).';
    }
    if ($phone === '' || $length($phone) > 32) {
        $errors[] = 'Please enter your phone number (up to 32 characters).';
    }
    
    // CAPTCHA Validation Logic
    if (!$recaptchaConfigured) {
        $errors[] = 'reCAPTCHA is not configured. Please contact the site administrator.';
    } elseif ($captchaResponse === '') {
        $errors[] = 'Please complete the reCAPTCHA checkbox.';
    } elseif (!function_exists('curl_init')) {
        error_log('reCAPTCHA verification requires the PHP cURL extension.');
        $errors[] = 'The reCAPTCHA service is unavailable. Please try again later.';
    } else {
        $verificationRequest = [
            'secret' => $recaptchaSecretKey,
            'response' => $captchaResponse,
        ];
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $verificationRequest['remoteip'] = (string) $_SERVER['REMOTE_ADDR'];
        }

        $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
        if ($curl === false) {
            error_log('Unable to initialize the reCAPTCHA verification request.');
            $errors[] = 'The reCAPTCHA service is unavailable. Please try again later.';
        } elseif (!curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($verificationRequest),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
        ])) {
            curl_close($curl);
            error_log('Unable to configure the reCAPTCHA verification request.');
            $errors[] = 'The reCAPTCHA service is unavailable. Please try again later.';
        } else {
            $verificationResponse = curl_exec($curl);
            $httpStatus = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            curl_close($curl);

            if ($verificationResponse === false || $httpStatus !== 200) {
                error_log('reCAPTCHA verification request failed: ' . $curlError);
                $errors[] = 'The reCAPTCHA service is unavailable. Please try again later.';
            } else {
                $verificationResult = json_decode($verificationResponse, true);
                if (!is_array($verificationResult) || ($verificationResult['success'] ?? false) !== true) {
                    $errors[] = 'Please complete the reCAPTCHA checkbox.';
                }
            }
        }
    }
   
    $submitted = !$errors;
}

require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="wrap page-hero-inner">
      <div class="page-hero-copy">
        <p class="eyebrow"><span class="eyebrow-dot"></span> DJM Tool Support</p>
        <h1>How can we help your team?</h1>
        <p>Send us your question, request onboarding assistance, or tell us what your steel drafting workflow needs.</p>
        <div class="page-hero-actions">
          <a class="button" href="#support-form">Send a support request</a>
          <a class="button button-ghost" href="tel:+17324972972">+1 (732) 497-2972</a>
        </div>
        <div class="hero-stats-row">
          <div class="hero-stat-pill"><span class="stat-dot"></span> Dedicated Implementation</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Direct Phone Support</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Fast Response Times</div>
        </div>
      </div>
      <figure class="page-hero-visual-card">
        <img src="images/page-hero-support.svg?v=<?= (string) filemtime(__DIR__ . '/images/page-hero-support.svg') ?>" alt="DJM Tool support illustration inviting teams to contact support for product and project help" width="576" height="323" fetchpriority="high">
      </figure>
    </div>
  </section>
  <section class="support-section wrap">
    <div class="support-copy">
      <p class="eyebrow dark">Get in touch</p>
      <h2>We’re here to help you move work forward.</h2>
      <p>Complete the form and make sure your contact details are correct. A support inbox must be configured on the website server before messages can be delivered.</p>
      <div class="support-note"><strong>Need a quick answer?</strong><span>Use the contact details in the footer once your business details have been added.</span></div>
    </div>
    <div class="support-form-wrap">
      <?php if ($submitted): ?>
        <p class="notice success" role="status">Thanks, <?= htmlspecialchars($firstName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>. Your details passed validation, but this website is not yet connected to a support inbox. Please contact the team using the updated details in the footer.</p>
      <?php endif; ?>
      <?php if ($errors): ?>
        <div class="notice error" role="alert"><p>Please check the following:</p><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>
      <?php if (!$recaptchaConfigured): ?>
        <p class="notice error" role="alert">The reCAPTCHA keys are not configured correctly, so the support form cannot be submitted yet.</p>
      <?php endif; ?>
      <form method="post" action="support.php" class="support-form" id="support-form">
        <div class="form-field"><label for="first-name">First name</label><input id="first-name" name="first_name" autocomplete="given-name" maxlength="100" value="<?= htmlspecialchars($firstName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" required></div>
        <div class="form-field"><label for="last-name">Last name</label><input id="last-name" name="last_name" autocomplete="family-name" maxlength="100" value="<?= htmlspecialchars($lastName, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" required></div>
        <div class="form-field form-field-wide"><label for="email">Email address</label><input id="email" name="email" type="email" autocomplete="email" maxlength="254" value="<?= htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" required></div>
        <div class="form-field form-field-wide"><label for="phone">Phone number</label><input id="phone" name="phone" type="tel" autocomplete="tel" maxlength="32" value="<?= htmlspecialchars($phone, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" required></div>
        <div class="form-field form-field-wide"><label for="message">Message</label><textarea id="message" name="message" rows="5" maxlength="2000" required><?= htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></textarea></div>
        <?php if ($recaptchaConfigured): ?>
          <div class="form-field form-field-wide">
            <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($recaptchaSiteKey, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"></div>
          </div>
          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <?php endif; ?>
        <p class="form-legal form-field-wide">By submitting this form, you agree to our <a href="privacy-policy.php">Privacy Policy</a> and <a href="terms-of-service.php">Terms of Service</a>.</p>
        <button class="button form-field-wide" type="submit"<?= $recaptchaConfigured ? '' : ' disabled' ?>>Submit request</button>
      </form>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>


