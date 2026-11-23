<?php
$currentPage = 'about';
$pageTitle = 'About | DJM Tool';
$pageDescription = 'Learn about DJM Tool, practical project management for structural steel teams.';
require __DIR__ . '/includes/header.php';
?>
<main id="main">
  <section class="page-hero">
    <div class="wrap page-hero-inner">
      <div class="page-hero-copy">
        <p class="eyebrow"><span class="eyebrow-dot"></span> About DJM Tool</p>
        <h1>Made for the moving parts of project work</h1>
        <p>Good project coordination starts with clear information, shared responsibilities, and a team that can see what comes next.</p>
        <div class="page-hero-actions">
          <a class="button" href="features.php">Explore the features</a>
          <a class="button button-ghost" href="pricing.php">View Pricing</a>
        </div>
        <div class="hero-stats-row">
          <div class="hero-stat-pill"><span class="stat-dot"></span> Structural Steel Focus</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Real-Time Coordination</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Single Workspace</div>
        </div>
      </div>
      <figure class="page-hero-visual-card">
        <img src="images/page-hero-about.png" alt="Engineer overseeing a structural steel project, with the About DJM Tool introduction" width="577" height="324" fetchpriority="high">
      </figure>
    </div>
  </section>
  <section class="about-section wrap">
    <div class="about-copy">
      <p class="eyebrow dark">A clearer way to work</p>
      <h2>Practical tools for structural steel teams</h2>
      <p>DJM Tool brings project planning and team coordination into one accessible workspace. Keep schedules, tasks, and team activity connected, so less time is spent searching for updates and more time is spent moving work forward.</p>
      <p>Whether you’re coordinating a single project or keeping an eye on several, the goal is straightforward: make the important details easier to find and the next step easier to understand.</p>
      <a class="button" href="features.php">Explore the features</a>
    </div>
    <aside class="about-card">
      <img class="about-illustration" src="images/DJMtool Project Dashboard.png" alt="DJM Tool CRM dashboard showing project status and team progress" width="640" height="360" loading="lazy">
      <div class="about-card-copy">
        <h3>Clarity at every step</h3>
        <p>Projects, people, and tasks in one place—organized around how teams get work done.</p>
      </div>
    </aside>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>

