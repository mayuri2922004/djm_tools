<?php
$currentPage = 'pricing';
$pageTitle = 'Pricing | DJM Tool';
$pageDescription = 'Explore DJM Tool options and request pricing tailored to your team and project management needs.';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="wrap page-hero-inner">
      <div class="page-hero-copy">
        <p class="eyebrow"><span class="eyebrow-dot"></span> Straightforward &amp; Tailored</p>
        <h1>A setup that fits the way your team works</h1>
        <p>Tell us what your steel drafting team needs. We’ll help you choose the right modules and provide a transparent quote tailored to your operations.</p>
        <div class="page-hero-actions">
          <a class="button" href="support.php">Request a quote</a>
          <a class="button button-ghost" href="features.php">Explore Features</a>
        </div>
        <div class="hero-stats-row">
          <div class="hero-stat-pill"><span class="stat-dot"></span> Free Essentials Available</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Shared &amp; Dedicated Hosting</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> No Surprise Fees</div>
        </div>
      </div>
      <figure class="page-hero-visual-card">
        <img src="images/page-hero-pricing.svg?v=<?= (string) filemtime(__DIR__ . '/images/page-hero-pricing.svg') ?>" alt="DJM Tool pricing options showing free project essentials and custom quotes for shared or dedicated hosting" width="680" height="380" fetchpriority="high">
      </figure>
    </div>
  </section>
  <section class="pricing-section wrap" aria-labelledby="pricing-title">
    <div class="section-heading pricing-heading">
      <p class="eyebrow dark">Straightforward and tailored</p>
      <h2 id="pricing-title">Choose a place to start</h2>
      <p>Pricing depends on your team and the modules you need. Contact us for a quote—no made-up rates or surprise plan prices.</p>
    </div>
    <div class="pricing-grid">
      <article class="pricing-card">
        <span class="pricing-label">Projects</span>
        <h3>Project Essentials</h3>
        <p class="pricing-description">For teams looking to bring project plans and day-to-day tasks into one view.</p>
        <p class="pricing-price">Free</p>
        <ul><li>Project management</li><li>Schedules and milestones</li><li>Task management</li><li>Project handoff visibility</li></ul>
        <a class="button button-outline" href="support.php">Request a quote</a>
      </article>
      <article class="pricing-card pricing-card-featured">
        <span class="pricing-label">Teams</span>
        <h3>Shared Hosting</h3>
        <p class="pricing-description">For multiple users who need access to DJM Tool on shared hosting.</p>
        <p class="pricing-price">Custom quote</p>
        <ul><li>Multiple users</li><li>Shared hosting</li><li>Team and task ownership</li><li>Shared progress updates</li></ul>
        <a class="button" href="support.php">Request a quote</a>
      </article>
      <article class="pricing-card">
        <span class="pricing-label">Operations</span>
        <h3>Dedicated Hosting</h3>
        <p class="pricing-description">For multiple users who need their own dedicated hosting environment.</p>
        <p class="pricing-price">Custom quote</p>
        <ul><li>Multiple users</li><li>Dedicated hosting</li><li>Cross-project work visibility</li><li>Configuration based on your needs</li></ul>
        <a class="button button-outline" href="support.php">Request a quote</a>
      </article>
    </div>
    <p class="pricing-footnote">Plan names are starting points, not fixed packages. Contact us to confirm available features and pricing for your team.</p>
  </section>
  <section class="pricing-faq">
    <div class="wrap pricing-faq-inner">
      <div><p class="eyebrow dark">Have questions?</p><h2>Not sure which option is right?</h2></div>
      <p>Tell us how your team manages projects today and which modules you’re interested in. We’ll help you find a suitable setup and share a quote.</p>
      <a class="button" href="support.php">Talk to our team</a>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>



