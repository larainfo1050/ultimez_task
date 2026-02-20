# Customer Management System - CodeIgniter 4

A simple and elegant customer management system built with CodeIgniter 4 and Bootstrap 5. This application allows you to view, search, and paginate customer records efficiently.

## 🌟 Features

- ✅ Display customer records in a responsive table
- ✅ Search functionality (First Name, Last Name, City, Country)
- ✅ Pagination with 10 records per page
- ✅ Search works seamlessly with pagination
- ✅ Reset button to clear search and pagination
- ✅ Bootstrap 5 modern UI design
- ✅ "No data found" message when search returns empty results
- ✅ Serial number auto-calculation based on current page

## 📋 Table Columns

The application displays the following customer information:

1. **Serial Number** - Auto-generated based on pagination
2. **First Name**
3. **Last Name**
4. **City**
5. **Country**
6. **Mobile Number**
7. **Date & Time** - Formatted display

## 🚀 Installation & Setup

### Prerequisites

Before you begin, ensure you have the following installed:
- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- XAMPP/WAMP/MAMP (or any local server)
- Git (for cloning)

### Step 1: Clone the Repository

```bash
git clone https://github.com/larainfo1050/ultimez_task.git
cd ultimez_task
```

Or download the ZIP file and extract it to your web server directory.

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Configure Environment

1. Copy the `env` file to `.env`:

**Windows:**
```cmd
copy env .env
```

**Mac/Linux:**
```bash
cp env .env
```

2. Open [`.env`](.env) and configure your database settings:

```ini
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = ultimez_interview_tasks
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

**Important:** Update the database credentials according to your local setup:
- `database.default.database` - Your database name
- `database.default.username` - Your MySQL username
- `database.default.password` - Your MySQL password

### Step 4: Create Database

1. Open **phpMyAdmin** or your MySQL client
2. Create a new database named `ultimez_interview_tasks`
3. Import the SQL file (if provided) or create the table manually:

```sql
CREATE DATABASE ultimez_interview_tasks;
USE ultimez_interview_tasks;

CREATE TABLE tbl_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    mobile_number VARCHAR(20) NOT NULL,
    date_n_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO tbl_customers (first_name, last_name, city, country, mobile_number) VALUES
('John', 'Doe', 'New York', 'USA', '1234567890'),
('Jane', 'Smith', 'London', 'UK', '9876543210'),
('Mike', 'Johnson', 'Toronto', 'Canada', '5555555555'),
('Sarah', 'Williams', 'Sydney', 'Australia', '1112223333'),
('David', 'Brown', 'Paris', 'France', '4445556666'),
('Emily', 'Davis', 'Berlin', 'Germany', '7778889999'),
('Robert', 'Miller', 'Tokyo', 'Japan', '1231231234'),
('Lisa', 'Wilson', 'Mumbai', 'India', '9879879876'),
('James', 'Moore', 'Dubai', 'UAE', '5675675678'),
('Maria', 'Taylor', 'Rome', 'Italy', '3213213210'),
('Chris', 'Anderson', 'Madrid', 'Spain', '6546546543'),
('Anna', 'Thomas', 'Amsterdam', 'Netherlands', '7897897890');
```

### Step 5: Set File Permissions (Mac/Linux only)

```bash
chmod -R 777 writable/
```

### Step 6: Run the Application

**Option 1: Using PHP Built-in Server**
```bash
php spark serve
```
Then open: `http://localhost:8080/customers`

**Option 2: Using XAMPP/WAMP**
1. Move project to `htdocs` folder (XAMPP) or `www` folder (WAMP)
2. Start Apache and MySQL from control panel
3. Open: `http://localhost/ultimez_task/public/customers`

## 📁 Project Structure

```
ultimez_task/
├── app/
│   ├── Controllers/
│   │   └── CustomerController.php    # Main controller
│   ├── Models/
│   │   └── CustomerModel.php         # Customer model
│   ├── Views/
│   │   └── customer_list.php         # Main view
│   └── Config/
│       └── Routes.php                # Route configuration
├── public/
│   └── index.php                     # Entry point
├── .env                              # Environment configuration
├── composer.json                     # Composer dependencies
└── README.md                         # This file
```

## 🎯 Usage

### Viewing Customers

Navigate to the customers page to see all customer records displayed in a paginated table.

### Searching Customers

1. Enter search term in the search box
2. Click the **Search** button
3. Results will be filtered based on:
   - First Name
   - Last Name
   - City
   - Country

### Reset Search

Click the **Reset** button to:
- Clear the search filter
- Reset pagination to page 1
- Display all customers

### Pagination

- Each page displays **10 records**
- Use pagination links at the bottom to navigate
- Pagination maintains search filters
- Serial numbers adjust automatically based on current page

## 🔧 Key Files Explained

### [`CustomerController.php`](app/Controllers/CustomerController.php)

Main controller that handles:
- Fetching customer data from [`CustomerModel`](app/Models/CustomerModel.php)
- Processing search queries
- Implementing pagination
- Passing data to [`customer_list`](app/Views/customer_list.php) view

### [`CustomerModel.php`](app/Models/CustomerModel.php)

Model class that:
- Connects to `tbl_customers` table
- Defines allowed fields for database operations
- Extends CodeIgniter's base Model class

### [`customer_list.php`](app/Views/customer_list.php)

View file that displays:
- Search form with input and buttons
- Customer data table with all columns
- Pagination controls
- "No data found" message

## 🐛 Troubleshooting

### "We seem to have hit a snag" Error

**Solution:** Ensure `.env` file is properly renamed and configured with correct database credentials.

### Database Connection Failed

**Check:**
1. MySQL service is running
2. Database name exists
3. Username and password are correct in [`.env`](.env)
4. `CI_ENVIRONMENT = development` is enabled for detailed errors

### Pagination Not Working

**Solution:** Ensure your [`.env`](.env) file has:
```ini
app.baseURL = 'http://localhost:8080/'
```

### Search Returns No Results

**Verify:**
1. Database has data in `tbl_customers` table
2. Search is case-insensitive by default
3. Search filters only First Name, Last Name, City, and Country

## 📸 Screenshots

_(Add screenshots here showing the application interface)_

### Main Customer List
![Customer List](screenshots/customer-list.png)

### Search Functionality
![Search Results](screenshots/search-results.png)

### No Data Found
![No Data](screenshots/no-data.png)

## 🛠️ Technologies Used

- **CodeIgniter 4** - PHP Framework
- **Bootstrap 5** - CSS Framework
- **MySQL** - Database
- **PHP 8.1+** - Backend Language
- **Composer** - Dependency Management

## 📝 Requirements Met

✅ Display Serial Number, First Name, Last Name, City, Country, Mobile Number and Date & Time in Table  
✅ Search input textbox with search button and reset button  
✅ Search filters First Name, Last Name, City and Country  
✅ Reset button resets pagination  
✅ Pagination with limit 10 for each page  
✅ Pagination works with search filter  
✅ "No data found" message when search returns empty results  
