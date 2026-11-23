<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-brand">
      <a class="footer-logo-link" href="index.php" aria-label="DJM Tool home"><img src="images/djmtools-logo.jpg" alt="DJM Tool" width="180" height="85"></a>
      <p>Practical project management and team coordination for structural steel teams.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
      <h2>Explore</h2>
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="support.php">Support</a>
    </nav>
    <nav class="footer-nav footer-legal" aria-label="Legal">
      <h2>Legal</h2>
      <a href="privacy-policy.php">Privacy Policy</a>
      <a href="terms-of-service.php">Terms of Service</a>
    </nav>
    <div class="footer-contact">
      <h2>Location</h2>
      <address>421 Mato-shee Ave, <br>Highland Park, NJ 08904, USA</address>
 
    </div>
    <div class="footer-contact">
      <h2>Contact</h2>
      <a href="tel:+17324972972">+1 (732) 497-2972</a>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="wrap footer-bottom-inner">
      <span>Copyright © <?= date('Y') ?> DJM Tool. All rights reserved.</span>
      <nav aria-label="Legal links">
        <a href="terms-of-service.php">Terms of Service</a>
        <span aria-hidden="true">|</span>
        <a href="privacy-policy.php">Privacy Policy</a>
      </nav>
    </div>
  </div>
</footer>
<div class="assistant-widget">
  <section class="assistant-panel" id="assistant-panel" aria-labelledby="assistant-title" hidden>
    <header class="assistant-header">
      <div>
        <span class="assistant-status" aria-hidden="true"></span>
        <strong id="assistant-title">DJM Tool Assistant</strong>
        <p>AI answers powered by Google Gemini</p>
      </div>
      <button class="assistant-close" type="button" aria-label="Close assistant">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </header>
    <div class="assistant-messages" role="log" aria-live="polite" aria-relevant="additions">
      <div class="assistant-message assistant-message-bot"><p>Hi! I can answer questions about DJM Tool modules, pricing, and support.</p></div>
    </div>
    <div class="assistant-suggestions" aria-label="Suggested questions">
      <button type="button" data-assistant-question="What modules are available?">Explore modules</button>
      <button type="button" data-assistant-question="How does pricing work?">Pricing</button>
      <button type="button" data-assistant-question="How do I contact support?">Contact support</button>
    </div>
    <form class="assistant-form">
      <label class="assistant-sr-only" for="assistant-question">Ask a question</label>
      <input id="assistant-question" name="question" type="text" maxlength="300" placeholder="Ask a question..." autocomplete="off" required>
      <button type="submit" aria-label="Send question">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 11 18-8-8 18-2-8-8-2Z"/><path d="m11 13 5-5"/></svg>
      </button>
    </form>
    <p class="assistant-disclaimer">Questions are sent to Google Gemini to generate answers. Don’t share sensitive information.</p>
  </section>
  <button class="assistant-launcher" type="button" aria-expanded="false" aria-controls="assistant-panel" aria-label="Open DJM Tool Assistant">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 14.2 9.8 21 12l-6.8 2.2L12 21l-2.2-6.8L3 12l6.8-2.2L12 3Z"/><path d="m19 2 .8 2.2L22 5l-2.2.8L19 8l-.8-2.2L16 5l2.2-.8L19 2Z"/></svg>
    <span>Ask DJM</span>
  </button>
</div>
</body>
</html>


