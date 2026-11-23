<?php
$currentPage = 'privacy';
$pageTitle = 'Privacy Policy | DJM Tool';
$pageDescription = 'Learn what information the DJM Tool website collects and how it is handled.';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="legal-page">
  <section class="page-hero legal-hero">
    <div class="wrap page-hero-inner">
      <p class="eyebrow">DJM Tool · Legal</p>
      <h1>Privacy Policy</h1>
      <p>How information is handled when you visit the DJM Tool website.</p>
    </div>
  </section>
  <div class="wrap legal-layout">
    <nav class="legal-toc" aria-label="Privacy policy sections">
      <p>On this page</p>
      <a href="#overview">Overview</a>
      <a href="#information">Information you enter</a>
      <a href="#technical">Technical information</a>
      <a href="#cookies">Cookies &amp; analytics</a>
      <a href="#choices">Your choices</a>
      <a href="#updates">Policy updates</a>
    </nav>
    <article class="legal-document">
      <div class="legal-document-meta"><span>Website policy</span><span>Last updated: November 16, 2026</span></div>
      <section id="overview" class="legal-intro">
        <h2>Privacy, in plain language</h2>
        <p>This policy describes the information handled by this website. The website provides product information and an AI assistant. Its support form validates the information you enter but is not connected to an inbox or a database.</p>
      </section>
      <section id="information" class="legal-section">
        <h2>Information you enter</h2>
        <p>The support form asks for your first name, last name, email address, phone number, and message. The website uses these details to validate the form and display a confirmation on the page. At this time, it does not save or send the form submission to DJM Tool.</p>
        <p>If you use the AI assistant, the question you enter is sent from the website server to Google Gemini to generate a response. The website does not save chat messages. Google may process the question under its own terms and privacy practices; see <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Google’s Privacy Policy</a>. Do not enter sensitive or confidential information into the assistant.</p>
      </section>
      <section id="technical" class="legal-section">
        <h2>Technical information and third parties</h2>
        <p>The web hosting provider may process standard technical information, such as your IP address, browser type, and the time of a request, in server logs as part of operating and protecting the website. How long those logs are retained depends on the hosting configuration.</p>
        <p>This website loads fonts from Google Fonts, uses Google reCAPTCHA on the support form to prevent automated submissions, and sends AI assistant questions to Google Gemini. Google may receive technical information, including your IP address and browser details, when providing these services. See <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Google’s Privacy Policy</a> for information about Google’s handling of that data.</p>
      </section>
      <section id="cookies" class="legal-section">
        <h2>Cookies and analytics</h2>
        <p>The website’s current code does not set analytics or advertising cookies. Your browser or hosting environment may still use technical storage or logs needed to deliver the site.</p>
      </section>
      <section id="choices" class="legal-section">
        <h2>Data security and your choices</h2>
        <p>Because support requests and chat messages are not currently stored or forwarded by this website, it cannot retrieve or delete them after processing. Questions sent to Google Gemini are subject to Google’s data practices. If you have a question about information associated with a website visit, contact the site operator using verified contact details.</p>
      </section>
      <section id="updates" class="legal-section">
        <h2>Changes to this policy</h2>
        <p>This policy may be updated when the website or its data practices change. The “Last updated” date above indicates the latest revision. Before enabling support-message delivery, analytics, or other data collection, this policy should be revised to describe the actual practices.</p>
      </section>
    </article>
  </div>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
