const menuButton = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.links');

if (menuButton && navLinks) {
  menuButton.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('open');
    menuButton.setAttribute('aria-expanded', String(isOpen));
    menuButton.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
  });

  navLinks.addEventListener('click', (event) => {
    if (event.target instanceof HTMLAnchorElement) {
      navLinks.classList.remove('open');
      menuButton.setAttribute('aria-expanded', 'false');
      menuButton.setAttribute('aria-label', 'Open navigation');
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && navLinks.classList.contains('open')) {
      navLinks.classList.remove('open');
      menuButton.setAttribute('aria-expanded', 'false');
      menuButton.setAttribute('aria-label', 'Open navigation');
      menuButton.focus();
    }
  });
}

const supportForm = document.querySelector('.support-form');

if (supportForm) {
  const recaptchaWidget = supportForm.querySelector('.g-recaptcha');
  const recaptchaError = supportForm.querySelector('[data-recaptcha-error]');

  if (recaptchaWidget && recaptchaError) {
    supportForm.addEventListener('submit', (event) => {
      const response = supportForm.querySelector('[name="g-recaptcha-response"]');
      const isComplete = response instanceof HTMLTextAreaElement && response.value.trim() !== '';

      recaptchaError.hidden = isComplete;
      if (!isComplete) {
        event.preventDefault();
        recaptchaError.focus();
        recaptchaWidget.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
  }
}

const assistantLauncher = document.querySelector('.assistant-launcher');
const assistantPanel = document.querySelector('.assistant-panel');
const assistantClose = document.querySelector('.assistant-close');
const assistantForm = document.querySelector('.assistant-form');
const assistantInput = document.querySelector('#assistant-question');
const assistantMessages = document.querySelector('.assistant-messages');

if (assistantLauncher && assistantPanel && assistantClose && assistantForm && assistantInput && assistantMessages) {
  const addMessage = (text, sender) => {
    const message = document.createElement('div');
    message.className = `assistant-message assistant-message-${sender}`;

    const paragraph = document.createElement('p');
    paragraph.textContent = text;
    message.append(paragraph);

    assistantMessages.append(message);
    assistantMessages.scrollTop = assistantMessages.scrollHeight;
    return message;
  };

  const addTypingIndicator = () => {
    const message = addMessage('', 'bot');
    const paragraph = message.querySelector('p');
    paragraph.classList.add('assistant-typing');

    const accessibleStatus = document.createElement('span');
    accessibleStatus.className = 'assistant-sr-only';
    accessibleStatus.textContent = 'AI is generating a reply.';
    paragraph.append(accessibleStatus);

    for (let index = 0; index < 3; index += 1) {
      const dot = document.createElement('span');
      dot.className = 'assistant-typing-dot';
      dot.setAttribute('aria-hidden', 'true');
      paragraph.append(dot);
    }

    return paragraph;
  };

  const submitQuestion = async (question) => {
    const value = question.trim();
    if (!value) {
      return;
    }

    addMessage(value, 'user');
    assistantInput.value = '';
    assistantInput.disabled = true;
    const submitButton = assistantForm.querySelector('button[type="submit"]');
    if (submitButton) {
      submitButton.disabled = true;
    }
    assistantPanel.querySelectorAll('[data-assistant-question]').forEach((button) => {
      button.disabled = true;
    });

    const replyText = addTypingIndicator();

    try {
      const response = await fetch('assistant.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ question: value })
      });
      let result;
      try {
        result = await response.json();
      } catch {
        throw new Error('The assistant returned an invalid response. Please try again.');
      }

      if (!response.ok) {
        throw new Error(typeof result.error === 'string' ? result.error : 'The assistant could not answer right now. Please try again.');
      }
      if (typeof result.answer !== 'string' || !result.answer.trim()) {
        throw new Error('The assistant returned an empty answer. Please try again.');
      }

      replyText.classList.remove('assistant-typing');
      replyText.textContent = result.answer;
    } catch (error) {
      console.error('Assistant request failed:', error);
      replyText.classList.remove('assistant-typing');
      replyText.textContent = error instanceof Error ? error.message : 'The assistant could not answer right now. Please try again.';
    } finally {
      assistantInput.disabled = false;
      if (submitButton) {
        submitButton.disabled = false;
      }
      assistantPanel.querySelectorAll('[data-assistant-question]').forEach((button) => {
        button.disabled = false;
      });
      assistantMessages.scrollTop = assistantMessages.scrollHeight;
      assistantInput.focus();
    }
  };

  assistantLauncher.addEventListener('click', () => {
    const isOpen = assistantPanel.hidden;
    assistantPanel.hidden = !isOpen;
    assistantLauncher.setAttribute('aria-expanded', String(isOpen));
    assistantLauncher.setAttribute('aria-label', isOpen ? 'Close DJM Tool Assistant' : 'Open DJM Tool Assistant');

    if (isOpen) {
      assistantInput.focus();
    }
  });

  assistantClose.addEventListener('click', () => {
    assistantPanel.hidden = true;
    assistantLauncher.setAttribute('aria-expanded', 'false');
    assistantLauncher.setAttribute('aria-label', 'Open DJM Tool Assistant');
    assistantLauncher.focus();
  });

  assistantForm.addEventListener('submit', (event) => {
    event.preventDefault();
    submitQuestion(assistantInput.value);
  });

  assistantPanel.querySelectorAll('[data-assistant-question]').forEach((button) => {
    button.addEventListener('click', () => {
      submitQuestion(button.dataset.assistantQuestion || '');
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !assistantPanel.hidden) {
      assistantPanel.hidden = true;
      assistantLauncher.setAttribute('aria-expanded', 'false');
      assistantLauncher.setAttribute('aria-label', 'Open DJM Tool Assistant');
      assistantLauncher.focus();
    }
  });
}
