# FAVCON - Online Appointment System

Welcome to FAVCON, your go-to solution for managing appointments online. This Laravel-based application streamlines the appointment booking process, making it easy for both service providers and clients to schedule and manage appointments effortlessly.

## Table of Contents

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
  - [Configuration](#configuration)
  - [Creating Appointments](#creating-appointments)
  - [Managing Appointments](#managing-appointments)
- [Contributing](#contributing)
- [License](#license)

## Getting Started

### Prerequisites

Before you begin, ensure that you have the following prerequisites installed:

- [PHP](https://www.php.net/) (7.4 or higher)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [npm](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) or another supported database

### Installation

1. Clone the repository:
   ```
   git clone https://github.com/jeonlei-01/favcon_appointment_system.git
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install JavaScript dependencies:
   ```
   npm install && npm run dev
   ```

4. Copy the `.env.example` file to `.env` and configure your database connection:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Migrate the database:
   ```
   php artisan migrate
   ```

7. Seed the database with sample data (optional):
   ```
   php artisan db:seed
   ```

8. Run the development server:
   ```
   php artisan serve
   ```

   FAVCON is now accessible at [http://localhost:8000](http://localhost:8000).

## Usage

### Configuration

- Configure your details, time slots, and other settings in the `config/database.php` file.

### Creating Appointments

1. Visit the application in your web browser.
2. Navigate to the appointment page.
3. Choose a service, date, time and other information.
4. Provide your contact details.
5. Confirm and submit the appointment.

### Managing Appointments

1. Log in as an administrator.
2. Navigate to the admin dashboard.
3. View, edit, or delete appointments as needed.

## Contributing

We welcome contributions! Please follow our [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE). See the LICENSE file for details.

Happy scheduling with FAVCON! If you encounter any issues or have suggestions, feel free to open an [issue](https://github.com/your-username/favcon/issues).