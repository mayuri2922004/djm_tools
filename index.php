<?php
$currentPage = 'home';
$pageTitle = 'DJM Tool | Project management for steel teams';
$pageDescription = 'Bring structural steel projects, teams, and schedules together with DJM Tool.';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="hero">
    <div class="hero-inner wrap">
      <div class="hero-copy">
        <p class="eyebrow hero-kicker">Design <span aria-hidden="true">•</span> Plan <span aria-hidden="true">•</span> Deliver</p>
        <h1><span class="hero-title-line">Accelerate</span> <span class="hero-title-line hero-title-highlight">structural steel</span> <span class="hero-title-line">drafting &amp; master your</span> <span class="hero-title-line">project timelines</span></h1>
        <p class="hero-description">Unlock significant increases in drafting speed and maintain absolute control over complex project schedules with our management software.</p>
       
      </div>
      <figure class="hero-art">
        <img class="hero-dashboard-image" src="images/DJMtool Project Dashboard.png" alt="DJM Tool dashboard showing project schedules over a structural steel building" width="1672" height="941" fetchpriority="high">
      </figure>
    </div>
  </section>

  <section class="home-features wrap" aria-labelledby="home-features-title">
    <div class="home-feature-intro">
      <div class="home-feature-icon" aria-hidden="true"><svg viewBox="0 0 48 48"><path d="M6 34a18 18 0 1 1 36 0"/><path class="icon-accent" d="m24 27 11-13"/><circle cx="24" cy="27" r="2.5"/><path d="M7 34h34"/></svg></div>
      <div class="home-feature-copy"><h2 id="home-features-title">Key Features</h2><p>Unlock significant increases in drafting speed.</p></div>
    </div>
    <article class="home-feature-card">
      <div class="home-feature-icon" aria-hidden="true"><svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="18"/><path class="icon-accent" d="M24 12v13l9 6"/></svg></div>
      <div class="home-feature-copy"><h3>Speed</h3><p>Increase clock speed, boost productivity.</p></div>
    </article>
    <article class="home-feature-card">
      <div class="home-feature-icon" aria-hidden="true"><svg viewBox="0 0 48 48"><path d="m8 34 24-24 8 8-24 24-8-8Z"/><path class="icon-accent" d="m29 15 4 4M23 21l4 4M17 27l4 4M11 33l4 4"/></svg></div>
      <div class="home-feature-copy"><h3>Drafting</h3><p>Drafting and ruler tools for precise design.</p></div>
    </article>
    <article class="home-feature-card">
      <div class="home-feature-icon" aria-hidden="true"><svg viewBox="0 0 48 48"><path d="M8 40V25h8v15M20 40V17h8v23M32 40V10h8v30"/><path class="icon-accent" d="m7 17 10-7 8 3L39 4"/></svg></div>
      <div class="home-feature-copy"><h3>Gantt Chart</h3><p>Schedule your project with ease.</p></div>
    </article>
  </section>

  <section class="home-modules" aria-labelledby="home-modules-title">
    <div class="wrap">
      <div class="home-modules-heading">
        <div>
          <p class="eyebrow dark">One connected workspace</p>
          <h2 id="home-modules-title">CRM modules for your whole workflow</h2>
          <p>Keep projects, employee coordination, tasks, and team progress together in one place.</p>
        </div>
        <a class="inline-link" href="features.php">Explore all modules <span aria-hidden="true">→</span></a>
      </div>
      <div class="home-module-grid">
        <a class="home-module-card" href="features.php#project-management">
          <img src="images/project-management.svg" alt="Project dashboard and schedule overview" width="1672" height="941" loading="lazy">
          <span class="home-module-card-copy"><span class="home-module-label">01 / PLAN</span><strong>Project Management</strong><span>Keep milestones, schedules, and handoffs in view.</span><span class="home-module-link">Explore module <span aria-hidden="true">→</span></span></span>
        </a>
        <a class="home-module-card" href="features.php#employee-management">
          <img src="images/employee-management.svg" alt="Employee and team management overview" width="1600" height="900" loading="lazy">
          <span class="home-module-card-copy"><span class="home-module-label">02 / PEOPLE</span><strong>Employee Management</strong><span>Organize team details, roles, and responsibilities.</span><span class="home-module-link">Explore module <span aria-hidden="true">→</span></span></span>
        </a>
        <a class="home-module-card" href="features.php#task-management">
          <img src="images/task-management.svg" alt="Task board showing project work and status" width="1600" height="900" loading="lazy">
          <span class="home-module-card-copy"><span class="home-module-label">03 / DELIVER</span><strong>Task Management</strong><span>Make ownership and next steps easy to follow.</span><span class="home-module-link">Explore module <span aria-hidden="true">→</span></span></span>
        </a>
        <a class="home-module-card" href="features.php#employee-tracking">
          <img src="images/employee-tracking.svg" alt="Employee work progress and workload overview" width="1600" height="900" loading="lazy">
          <span class="home-module-card-copy"><span class="home-module-label">04 / PROGRESS</span><strong>Employee Monitoring &amp; Tracking</strong><span>Review assigned work, updates, and team workload.</span><span class="home-module-link">Explore module <span aria-hidden="true">→</span></span></span>
        </a>
      </div>
    </div>
  </section>

  <section class="home-cta">
    <div class="wrap home-cta-inner">
      <div><p class="eyebrow">Have a question?</p><h2>Let’s find a better way to manage your work.</h2></div>
      <a class="button button-light" href="support.php">Contact support</a>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>


