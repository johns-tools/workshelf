<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John Robinson - CV</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
      rel="stylesheet"
    >
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'ui-sans-serif', 'system-ui'],
            },
          },
        },
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="font-sans text-gray-800 bg-gray-50">
    <div class="max-w-3xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg">
      <header class="mb-6 text-center">
        <h1 class="text-4xl font-extrabold">John Robinson</h1>
        <p class="mt-2 text-gray-600">Email: <a href="mailto:johns.development.projects@gmail.com" class="text-blue-600 hover:underline">johns.development.projects@gmail.com</a></p>
        <p class="text-gray-600"><a href="https://oneaday.dev/one-hundred-apis" class="text-blue-600 hover:underline" target="_blank">oneaday.dev/one-hundred-apis</a></p>
      </header>

      <section class="mb-6">
        <h2 class="pb-2 mb-4 text-2xl font-semibold border-b-2 border-gray-200">Professional Summary</h2>
        <p class="leading-relaxed">Web Developer with over 15 years of professional experience, specialising in server side and API development using PHP (Laravel), Vue 3, and modern web technologies.
            Proven track record in leading spatial data applications and developing and integrating solutions with Python.
            Deep understanding of scalable back-end architecture, cost/performance focused development with an API endpoint approach.</p>
      </section>

      <section class="mb-6">
        <h2 class="pb-2 mb-4 text-2xl font-semibold border-b-2 border-gray-200">Technical Skills</h2>
        <div class="space-y-4">
          <div>
            <h3 class="font-semibold">Languages &amp; Frameworks</h3>
            <ul class="list-disc list-inside">
              <li>PHP, JavaScript, Python</li>
              <li>Laravel 11+, Vue 3 (Composition API with Pinia), Vite</li>
              <li>Tailwind CSS, Sass, HTML5</li>
            </ul>
          </div>
          <div>
            <h3 class="font-semibold">Databases &amp; Data Handling</h3>
            <ul class="list-disc list-inside">
              <li>PostgreSQL, MySQL, SQLite</li>
              <li>JSON APIs, RESTful integration</li>
            </ul>
          </div>
          <div>
            <h3 class="font-semibold">Tooling &amp; Environment</h3>
            <ul class="list-disc list-inside">
              <li>GitHub/GitLab with CI integration</li>
              <li>PHPUnit, Pest</li>
              <li>Composer, NPM, NVM</li>
              <li>Local Development: Laravel Herd, Forge, Homestead, Sail, Docker, WSL2 (Ubuntu)</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="mb-6">
        <h2 class="pb-2 mb-4 text-2xl font-semibold border-b-2 border-gray-200">Employment History</h2>
        <div class="space-y-4">
          <div>
            <h3 class="text-xl font-semibold">Lead Developer – LERC Wales</h3>
            <p class="italic text-gray-600">2019 – Present</p>
            <ul class="mt-2 list-disc list-inside">
              <li>Lead developer of a modern spatial search engine for biological records.</li>
              <li>Delivered a scalable, user-friendly platform for both public and private users.</li>
              <li>Tech stack includes Laravel 11+, Vue 3, Tailwind, PostgreSQL, and Python integration.</li>
              <li>Responsible for end-to-end architecture design, deployment, and performance tuning.</li>
              <li>Supporting and managing other developers, and leading the project's development and planning.</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="mb-6">
        <h2 class="pb-2 mb-4 text-2xl font-semibold border-b-2 border-gray-200">Education</h2>
        <p><span class="font-semibold">BSc Interactive Design &amp; Development</span><br>University of South Wales – 2009</p>
      </section>

      <section>
        <h2 class="pb-2 mb-4 text-2xl font-semibold border-b-2 border-gray-200">Portfolio</h2>
        <p>Explore my personal project, an ongoing daily development to create 100 unique API endpoints:</p>
        <p class="mt-2"><a href="https://oneaday.dev/one-hundred-apis" class="text-blue-600 hover:underline" target="_blank">oneaday.dev/one-hundred-apis</a></p>
      </section>
    </div>
  </body>
</html>
