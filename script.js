document.addEventListener("DOMContentLoaded", () => {
  const themeOptions = document.querySelectorAll(".theme-option");
  const savedTheme = getCookie("theme") || "auto";
  document.documentElement.setAttribute("data-theme", savedTheme);
  applyTheme(savedTheme);
  updateSelectedThemeUI(savedTheme);

  themeOptions.forEach(option => {
    option.addEventListener("click", () => {
      const selectedTheme = option.getAttribute("data-theme");
      applyTheme(selectedTheme);
      setCookie("theme", selectedTheme, 365);
      updateSelectedThemeUI(selectedTheme);
    });
  });

  // Accordion functionality
  const accordionButtons = document.querySelectorAll(".accordion-button");

  accordionButtons.forEach(button => {
    button.addEventListener("click", (e) => {
      e.stopPropagation();
      const content = button.nextElementSibling;
      const isOpen = content.classList.contains("open");

      document.querySelectorAll(".accordion-content").forEach(c => {
        c.classList.remove("open");
      });
      
      if (!isOpen) {
        content.classList.add("open");
      }
    });
  });

  document.addEventListener("click", (e) => {
    if (!e.target.closest(".accordion-item")) {
      document.querySelectorAll(".accordion-content").forEach(c => {
        c.classList.remove("open");
      });
    }
  });
});

function updateSelectedThemeUI(theme) {
  document.querySelectorAll(".theme-option").forEach(option => {
    option.classList.remove("selected");
    if (option.getAttribute("data-theme") === theme) {
      option.classList.add("selected");
    }
  });
}

function applyTheme(theme) {
  document.documentElement.setAttribute("data-theme", theme);
  switch (theme) {
    case "light":
      document.body.style.backgroundColor = "#fff";
      break;
    case "dark":
      document.body.style.backgroundColor = "#000";
      break;
    case "auto":
      const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
      applyTheme(prefersDark ? "dark" : "light");
      break;
  }
}

function setCookie(name, value, days) {
  const d = new Date();
  d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
  document.cookie = `${name}=${value};expires=${d.toUTCString()};path=/`;
}

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(";").shift();
  return null;
}