# Restoran

Restoran is a dynamic restaurant website built with Laravel and Vite, featuring both front-end customer views and back-end administrative functionalities. The website provides a seamless experience for users to view the menu, book tables, and place orders, while administrators can manage the restaurant's operations efficiently.

## Features

### Frontend (User View)
- **Home**: Displays a welcome message, restaurant highlights, and special offers.
- **About**: Provides details about the restaurant, its history, and mission.
- **Service**: Lists the services offered by the restaurant.
- **Menu**: Shows all available foods on the menu fetched from the database.
- **Contact**: Allows users to contact the restaurant directly.
- **Cart**: Available only when the user is logged in. Users can add and view items in their cart.
- **Book Table**: Users can book a table for dining.
- **Checkout**: Users can place orders and complete payments through PayPal.

### Backend (Admin Panel)
- **Dashboard**: Displays metrics such as total admins, total orders, total food items, and total bookings.
- **Admins**: Lists all admins, allowing the management of administrator accounts.
- **Orders**: Lists all customer orders with options to edit or delete.
- **Foods**: Manages the restaurant's menu, allowing admins to create, view, edit, and delete food items.
- **Bookings**: Displays table bookings, with options to edit or delete bookings.
- **Authentication**: Separate authentication for users and admins.

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Utkarsh1244p/restoran.git
   cd restoran

2. **Install PHP Dependencies**
Install the required PHP dependencies using Composer:
   ```bash
   composer install

3. **Install Node.js Dependencies**

   ```bash
   npm install

4. **Run Migrations**
I made many migrations in project, you can use them by running the migrations:
   ```bash
   php artisan migrate

5. **Run the Development Server**
Start the Laravel development server:
   ```bash
   php artisan serve

6. **Run Vite Development Server**
In a separate terminal window, start the Vite development server:
   ```bash
   npm run dev

## Usage

- Access the website at http://localhost:8000 to explore the frontend.
- Access the admin panel by navigating to http://localhost:8000/admin/login (admin login required).

## Admin Features

The admin panel includes the following sections:
1. **Dashboard**: Displays key metrics such as the total number of admins, orders, food items, and bookings.
2. **Admins**: Allows management of admin users (create, delete).
3. **Orders**: Displays customer orders with options to edit or delete.
4. **Foods**: Manage the restaurant’s menu (create, edit, delete).
5. **Bookings**: Manage customer bookings (edit, delete).

## Authentication

- **User Authentication**: Users can sign up, log in, and perform tasks like booking a table or placing an order.
- **Admin Authentication**: Admins have separate authentication and access control.

## PayPal Integration

The checkout process is handled using PayPal, allowing users to securely make payments.

## Contributing

If you want to contribute to the project, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature: git checkout -b feature/YourFeature.
3. Commit your changes: git commit -am 'Add some feature'.
4. Push to the branch: git push origin feature/YourFeature.
5. Create a new Pull Request.
