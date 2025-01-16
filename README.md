<h1 align="center">📝 Laravel Notes System</h1>
  <p align="center">A simple and efficient Laravel project to save and manage your personal notes with ease.</p>

  <hr>

  <h2>🚀 Features</h2>
  <ul>
    <li>Securely store and manage your notes.</li>
    <li>Built with Laravel's robust and scalable framework.</li>
  </ul>

  <hr>

  <h2>📦 Installing This System</h2>
  
  <h3>⚙️ 1. Setup Environment</h3>
  <ol>
    <li><b>Copy the <code>.env.example</code> file</b><br>
      Duplicate the <code>.env.example</code> file and rename it to <code>.env</code>:
      <pre><code>cp .env.example .env</code></pre>
    </li>
    <li><b>Configure MySQL Connection</b><br>
      Open the <code>.env</code> file and replace the placeholders with your MySQL database credentials. Ensure the <code>DB_CONNECTION</code> is set to <code>mysql</code>.
      <br><br>
      Example <code>.env</code> configuration:
      <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password</code></pre>
    </li>
    <li><b>Generate a New Encryption Key</b><br>
      Run the following Artisan command to generate the key used to encrypt sensitive data:
      <pre><code>php artisan key:generate</code></pre>
    </li>
    <li><b>Run Database Migrations</b><br>
      Execute the migrations to set up your database schema:
      <pre><code>php artisan migrate</code></pre>
    </li>
  </ol>

  <hr>

  <h3>🛠️ Additional Steps</h3>
  <ul>
    <li><b>Install Dependencies</b><br>
      Make sure all dependencies are installed:
      <pre><code>composer install
npm install
npm run dev</code></pre>
    </li>
    <li><b>Check Permissions</b><br>
      Ensure the <code>storage</code> and <code>bootstrap/cache</code> directories are writable:
      <pre><code>chmod -R 775 storage bootstrap/cache</code></pre>
    </li>
    <li><b>Serve the Application</b><br>
      Start the local development server:
      <pre><code>php artisan serve</code></pre>
    </li>
  </ul>

  <hr>

  <h2>📚 Made With</h2>
  <div align="left">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="PHP logo" />
    <img width="12" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" height="40" alt="Laravel logo" />
    <img width="12" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" height="40" alt="MySQL logo" />
    <img width="12" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="HTML5 logo" />
    <img width="12" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40" alt="CSS3 logo" />
  </div>

  <hr>

  <h2>🌟 Final Notes</h2>
  <ul>
    <li>Replace the placeholders in the <code>.env</code> file with your actual MySQL credentials.</li>
    <li>Keep your <code>.env</code> file secure and never commit it to version control.</li>
    <li>After setup, visit <a href="http://localhost:8000">http://localhost:8000</a> to test the application.</li>
  </ul>
