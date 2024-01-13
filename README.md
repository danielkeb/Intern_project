# Get PC Managment system
## Overview:
 - The GETPC-MS (get pc managment system) project is a developed by Laravel frame work, system designed for university community to streamline PC registration and management. 
 - The system incorporates features for barcode and QR code generation, along with pc owners identification.

### Key Features:

- Barcode and QR Code Generation: When pc registred automatically generate QR codes barcode .

The system includes functionalities for generating unique barcodes and QR codes for registered PCs. This enhances the efficiency of PC identification and management.
User Roles:
# Download qrcode and barcode page
![Alt Text](https://github.com/danielkeb/Intern_project/raw/main/public/images/downloadqrcode.png)

- Admin: Admin users have the authority to register security personnel, manage user permissions, and oversee the overall system operation.
- Granted Security: Granted Security users are responsible for managing PC Owners and handling incident reporting within the computer labs.
- PC Owners: PC Owners utilize Laravel forms for registration and updates related to their personal computers.

# Admin Dashboard
![Alt Text](https://github.com/danielkeb/Intern_project/raw/main/public/images/admindashboard.png)

### At Exit Gate Scanning:

A key feature of the system is the implementation of exit gate scanning. When students exit the university, they are required to scan their PC's barcode for verification.
How to Use:
## Scanning pc owners barcode or qrcode
![Alt Text](https://github.com/danielkeb/Intern_project/raw/main/public/images/waitingtoscan.png)


## Installation:

-- Clone the repository:
bash
Copy code
   - git clone https://github.com/danielkeb/Intern_project.git
   - Navigate to the project directory:

-- cd Intern_project
Install dependencies:
Copy code
-- composer install
- Copy the .env.example file to .env and configure your database settings.
- Database Migration and Seeding:

-- Run database migrations:
- php artisan migrate
- Seed the database:
Copy code
- php artisan db:seed
   - email: Admin1234@gmail.com password : 12345678
-Run the Application:
php artisan serve
Visit http://localhost:8000 to access the GETPCMS application.



# More page images:
## Login Page
![Alt Text](https://github.com/danielkeb/Intern_project/raw/main/public/images/logingtpcms.png)

## Task management page
![Alt Text](https://github.com/danielkeb/Intern_project/raw/main/public/images/taskpage.png)


## Hello Every One
#### If you're looking for a ready-to-roll solution, Get pc Management system is the answer. Interested parties, contact me for details and negotiations.

#### Own it now and take the next step in your tech journey!

#### Contact: +251921154404