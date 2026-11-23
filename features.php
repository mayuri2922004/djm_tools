<?php
$currentPage = 'features';
$pageTitle = 'Features | DJM Tool';
$pageDescription = 'Explore DJM Tool project management, employee management, task management, and employee tracking modules.';
require __DIR__ . '/includes/header.php';
?>
<main id="main" class="features-page">
  <section class="page-hero">
    <div class="wrap page-hero-inner">
      <div class="page-hero-copy">
        <p class="eyebrow"><span class="eyebrow-dot"></span> One connected workspace</p>
        <h1>Tools that keep your projects and people moving</h1>
        <p>Explore practical tools for planning projects, coordinating teams, managing tasks, and seeing work progress in real time.</p>
        <div class="page-hero-actions">
          <a class="button" href="pricing.php">View pricing</a>
          <a class="button button-ghost" href="support.php">Request a Demo</a>
        </div>
        <div class="hero-stats-row">
          <div class="hero-stat-pill"><span class="stat-dot"></span> 4 Core CRM Modules</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Gantt &amp; Milestones</div>
          <div class="hero-stat-pill"><span class="stat-dot"></span> Live Team Progress</div>
        </div>
      </div>
      <figure class="page-hero-visual-card">
        <img src="images/page-hero-features.png" alt="DJM Tool dashboard on a laptop with a list of project management features" width="576" height="324" fetchpriority="high">
      </figure>
    </div>
  </section>
  <nav class="feature-shortcuts wrap" aria-label="Jump to a feature">
    <a href="#project-management"><span>01</span> Projects</a>
    <a href="#employee-management"><span>02</span> Employees</a>
    <a href="#task-management"><span>03</span> Tasks</a>
    <a href="#employee-tracking"><span>04</span> Team progress</a>
  </nav>
  <section class="modules-section wrap" aria-labelledby="modules-title">
    <div class="section-heading">
      <p class="eyebrow dark">Four essential tools</p>
      <h2 id="modules-title">A clearer view of your workflow</h2>
      <p>Move from planning to delivery with project information and team updates in one place.</p>
    </div>
    <div class="module-detail-grid">
      <article class="module-detail" id="project-management">
        <img class="module-illustration" src="images/project-management.svg" alt="Project timeline with milestones and scheduled work" width="640" height="300" loading="lazy">
        <div class="module-detail-copy"><span class="module-number">01</span><p class="module-kicker">Plan and coordinate</p><h3>Project Management</h3>
          <p>Keep project details, schedules, milestones, and handoffs visible in one organized workspace. Give the team a shared view of what’s moving and what comes next.</p>
          <ul><li>Keep project milestones and key dates together</li><li>Review schedules and work across active projects</li><li>Coordinate drawing and project handoffs</li></ul>
          <a class="button module-learn-more" href="support.php">Learn more about Project Management</a>
        </div>
      </article>
      <article class="module-detail" id="employee-management">
        <img class="module-illustration" src="images/employee-management.svg" alt="Team members organized by role and project responsibility" width="640" height="300" loading="lazy">
        <div class="module-detail-copy"><span class="module-number">02</span><p class="module-kicker">Bring people together</p><h3>Employee Management</h3>
          <p>Make it easier to understand who is on the team and how responsibilities are shared across your projects.</p>
          <ul><li>Keep employee and team information organized</li><li>Clarify roles and project responsibilities</li><li>Coordinate people across project teams</li></ul>
          <a class="button module-learn-more" href="support.php">Learn more about Employee Management</a>
        </div>
      </article>
      <article class="module-detail" id="task-management">
        <img class="module-illustration" src="images/task-management.svg" alt="Project task board with assigned, active, and completed tasks" width="640" height="300" loading="lazy">
        <div class="module-detail-copy"><span class="module-number">03</span><p class="module-kicker">Turn plans into progress</p><h3>Task Management</h3>
          <p>Break project work into clear, manageable tasks. Keep ownership and progress easy to follow as work moves toward completion.</p>
          <ul><li>Organize work into clear tasks and next steps</li><li>Keep task ownership visible to the team</li><li>Follow task progress through completion</li></ul>
          <a class="button module-learn-more" href="support.php">Learn more about Task Management</a>
        </div>
      </article>
      <article class="module-detail" id="employee-tracking">
        <img class="module-illustration" src="images/employee-tracking.svg" alt="Team workload overview showing work progress and status" width="640" height="300" loading="lazy">
        <div class="module-detail-copy"><span class="module-number">04</span><p class="module-kicker">See team progress</p><h3>Employee Monitoring &amp; Tracking</h3>
          <p>Use work and project updates to understand progress and workload at a glance. Keep visibility focused on assigned tasks and shared project status.</p>
          <ul><li>Follow progress on assigned work</li><li>Review project updates and outstanding tasks</li><li>Spot workload imbalances and coordination needs</li></ul>
          <a class="button module-learn-more" href="support.php">Learn more about Employee Tracking</a>
        </div>
      </article>
    </div>
  </section>
  <section class="features-cta">
    <div class="wrap features-cta-inner">
      <div><p class="eyebrow dark">Ready to learn more?</p><h2>Let’s talk about your team’s workflow.</h2></div>
      <div class="features-cta-actions"><a class="button button-outline" href="pricing.php">View pricing</a><a class="button" href="support.php">Contact support</a></div>
    </div>
  </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
