# 🐿️ Squireal

## 📝 Overview

SquiReal is a mobile application aimed at promoting eco-friendly and sustainable living. The app provides a social platform for users to share their ecological achievements, participate in challenges, and discover local eco-friendly initiatives.

## 📱 Features

- **Social Feed**: Users can share their eco-friendly achievements and follow other users to see their posts.
- **Challenges**: Users can participate in eco-friendly challenges and earn rewards.
- **Local Initiatives**: Users can discover local eco-friendly initiatives and events.
- **Interactive Map**: Users can view eco-friendly initiatives and events on a map.
- **Profile**: Users can view their achievements and challenges they have participated in.
- **Leaderboard**: Users can view the top users with the most eco-friendly achievements.

## 📦 Installation

1. Clone the repository
   - Get the code by running `git clone https://github.com/pierregueroult/squireal.git` in your terminal.
   - Make sure you clone the repository in the root of your apache server (e.g. `htdocs` for XAMPP).
2. Setup the project
   - Create a `.env` file in the root of the project and fill in the required environment variables (see "env" as an example).
     - CI_ENVIRONMENT = development or production
     - app.baseURL with the URL of your server (e.g. `http://localhost/squireal`)
     - database.default with your database credentials and the name of the database `squireal`
   - Create a database called `squireal` in your MySQL server thanks to the files in `app/Database/migrations/`
   - Run `npm install` in the root of the project to install the required dependencies.
3. Start the server
   - Start your apache server and navigate to `localhost/squireal` in your browser.
   - You should see the Squireal landing page.
4. Development mode
   - Run `npm run style:dev` to watch for changes for the tailwindcss files.
   - Run `npm run prettier` to format the code with prettier.

If you have any issues, please explain them in the "Issues" tab of the repository.

## 📐 Contributors

- [@pierregueroult](https://pierregueroult.dev) - Pierre Guéroult / Full Stack Developer
- [@Lola-Herenguel](https://github.com/Lola-Herengul) - Lola Hérenguel / Full stack Developer
