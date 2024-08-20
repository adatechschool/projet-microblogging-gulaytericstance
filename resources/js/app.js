import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Logique de bascule du mode sombre
document.addEventListener('DOMContentLoaded', function () {
   const themeToggle = document.getElementById('themeToggle');
   const themeIcon = document.getElementById('themeIcon');
   const darkMode = localStorage.getItem('darkMode') === 'true';

   // Applique le thème initial
   if (darkMode) {
      document.documentElement.classList.add('dark');
      themeIcon.textContent = '🌙'; // 🌙 pour mode sombre
   }

   themeToggle.addEventListener('click', function () {
      const isDarkMode = document.documentElement.classList.toggle('dark');
      localStorage.setItem('darkMode', isDarkMode);
      themeIcon.textContent = isDarkMode ? '🌙' : '🌞'; // 🌞 pour mode clair
   });
});
