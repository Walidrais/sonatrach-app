<h1>Sonatrach Access</h1>

## Overview

Sonatrach Access is a web application developed to manage visitor access to the Arzew industrial zone, aiming to automate and secure the process of issuing temporary permits. The development process focused on leveraging current web technologies and best practices to create a robust, responsive, and user-friendly application.

## Technologies Used

<ul>
    <li><b>Laravel:</b> A powerful and flexible PHP framework providing a solid structure for web application development.</li>
    <li><b>Livewire:</b> A PHP library enabling real-time, interactive user interfaces without writing JavaScript.</li>
    <li><b>Tailwind CSS:</b> A utility-first CSS framework for building elegant and responsive user interfaces.</li>
    <li><b>DaisyUI:</b> A Tailwind CSS extension offering a collection of ready-to-use components for faster development.</li>
    <li><b>MySQL:</b> A widely-used open-source relational database management system.</li>
    <li><b>Eloquent ORM:</b> Laravel’s built-in object-relational mapping system, simplifying data manipulation.</li>
    <li><b>PHPMyAdmin:</b> A web-based interface for managing MySQL database operations.</li>
    <li><b>Visual Studio Code:</b> A lightweight, powerful source code editor with numerous features and extensions for an optimized development experience.</li>
</ul>

## Application Architecture

The application follows the MVC (Model-View-Controller) architecture using Laravel, facilitating clear separation of responsibilities, ease of maintenance, and scalability.

### Key Components

- Model: Manages business logic, data manipulation, and rules, using Eloquent ORM for MySQL database interactions.
- View: Handles the user interface, displaying data and enabling user interactions, using Blade templates for dynamic and reusable views.
- Controller: Acts as an intermediary between the model and the view, processing user requests, performing operations, and updating the view accordingly.

## Key Features

### For Complex Chiefs:

- Create access requests for drivers, escorts, trucks, and tankers quickly and easily.
- View approved or rejected requests via the application.

### For IDC Chiefs:

- Centralized management of all requests on the platform, providing complete control over the process.
- Fast validation and approval of access requests to ensure smooth operations.

### For Agents:

- Manage authorizations and print documents to ensure smooth and secure access.
- Advanced search functionalities for quick access to relevant information.

## Impact on the Company

- Reduced Wait Times: Online submission of access requests significantly reduces queues at the industrial zone entrance.
- Enhanced Security: Automated authorization processes ensure only approved visitors gain access, improving overall security.
- Streamlined Administrative Processes: Digital processes replace traditional paper-based methods, freeing up administrative teams to focus on strategic tasks.

## Security Measures

- CSRF Protection: Prevents cross-site request forgery attacks, ensuring all actions are legitimate and authorized.
- Secure Authentication: Robust authentication mechanisms with Jetstream for secure user and session management.
- Data Encryption: Encrypts sensitive data in the database, ensuring data integrity and security.
- Authorization Management: Allows precise definition of user access privileges based on roles and responsibilities.

## User Interface

- Login and Registration Pages: User-friendly and intuitive interfaces for entering credentials and creating accounts, with real-time validation and password recovery options.
- User Profile Page: Central hub for managing personal information, changing passwords, managing browser sessions, and deleting accounts.
- Request Creation Page: Intuitive form for entering request details, ensuring accuracy through real-time validation.
- Request Consultation Page: Summary table of requests with essential details and action buttons for quick review and decision-making.
- Request Details Page: Detailed information on specific requests, with action buttons for approval or rejection.
- Authorization List Page: Overview of existing authorizations with relevant information.
- Authorization Creation Page: User-friendly form for creating new authorizations, linking them to corresponding requests.
- Authorization Details Page: Detailed information on specific authorizations, with the option to print as a PDF.
