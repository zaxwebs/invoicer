
![github](https://github.com/user-attachments/assets/a4652844-19eb-4a7e-ae28-4253d59d07f1)

## About This Project


An invocing app designed for freelancers to simplify the invoicing process, making it easy to manage their invoices, customers, and more. Built with the robust and elegant Laravel framework.

This application is currently under active development. Some features may not be fully implemented, and certain areas of the app may be subject to change. I appreciate your understanding and welcome any feedback as I continue to build and improve the project.

## Features

### Invoice Management
- **Create Invoices**: Easily generate new invoices with detailed itemized lists.
- **View Invoices**: Access comprehensive views of all invoices with search and filter options.
- **Invoice Status**: Track the status of each invoice (e.g. Paid, Unpaid, Overdue).
- **Invoice PDFs**: Download invoices as PDF.

### Customer Management
- **Add Customers**: Register new customers with essential details such as name, email, phone, and address.
- **Edit Customers**: Modify customer information to keep records up-to-date.
- **View Customers**: Browse through the customer list with search and filtering capabilities.

### Reporting & Analytics
- **Invoice Reports**: Dashboard to analyze all invoices.
- **Customer Reports**: Obtain insights into customers.
- **Financial Summary**: View summaries of financial data to aid in decision-making.

### Settings & Configuration
- **System Settings**: Configure application settings such as default invoice details.

## Getting Started

To get a copy of the project up and running on your local machine, follow these steps:

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL or any other supported database

### Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/zaxwebs/invoicer.git
   ```
2. **Navigate to the project directory:**
   ```sh
   cd invoicer
   ```
3. **Install dependencies:**
   ```sh
   composer install
   ```
4. **Copy the example environment file and configure it:**
   ```sh
   cp .env.example .env
   ```
   Update the `.env` file with your database and other necessary configurations.

5. **Generate an application key:**
   ```sh
   php artisan key:generate
   ```
6. **Run the migrations:**
   ```sh
   php artisan migrate
   ```
7. **Seed the database (optional):**
   ```sh
   php artisan db:seed
   ```
8. **Serve the application:**
   ```sh
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to see the application in action.

## Acknowledgements

- [Laravel](https://laravel.com) - The PHP framework for web artisans.
- [Faker](https://github.com/fzaninotto/Faker) - For generating fake data for testing.
