# contacts-book
My first Laravel Project

serve this using ```php artisan serve --host=<your ip> --port:<port number>```

How to Use:
- Clone the repository with git clone
- Make necessary chenges in DB section of .env file
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- That's it - load the homepage

This project involves an application with the following functionalities:
- Signup using email (unique) + password (strength). 
- Reset password functionality using email.
- Data entry using CSV:
- User will able to upload a CSV file containing information of people which would be contacted by him. (Includes name, email, contact number, address and PIN Code).
- Email addresses of the people under a user are unique (Same email address cannot be repeated under different users)

- User Permissions:
    - Normal: Can upload CSV, View and Edit all the rows under him.
    - Moderator: Can view the rows under any user but can not edit them.
    - Admin: Can view and edit data under any user.

- View and Edit data:
    - User can add, view, edit or delete the data they have uploaded or added
    - Admin can add, view, edit or delete the data under any type of user
    - Moderator can only view data under any user
- Any task such as uploading a csv or viewing the database can be done only after logging in.
