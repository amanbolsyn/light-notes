# Light notes

Basic notes web application with CRUD and authorization that was written using plain PHP, MySql for database and tailwind for styling.

## Installation

Clone the repository 
```bash
git clone https://github.com/amanbolsyn/light-notes.git
```

Go to the cloned directory
```bash
cd light-notes/
```

Run the server on port 8000 
```bash
php -S localhost:8000 ./public/index.php
```

## Application Endpoints 

### Ticket endpoints 
| Method | Endpoint | Description | Auth Required |
|:------:|------|------|:------:|
| GET | `/notes` | view all notes | Yes
| GET | `/note/create`| load create note view | Yes
| POST | `/note` | create new note | Yes
| GET | `/note/edit` | load note edit view | Yes
| PATCH | `/note` | edit a note | Yes
| DELETE | `/note` | delete a note | Yes
| GET | `/note` | view one note | Yes

### Regisration endpoints 
| Method | Endpoint | Description | Auth Required |
|:------:|------|------|:------:|
| GET | `/register` | load register view | No
| POST | `/register`| create new user | No

### Session endpoints 
| Method | Endpoint | Description | Auth Required |
|:------:|------|------|:------:|
| GET | `/login` | load login view| No
| POST | `/login`| create new session | No
| DELETE | `/logout` | delete a session | No

## Roles

| Permissions | User |
|------|:------:|
| View own notes| Yes|
| Create new notes| Yes |
| Delete notes| Yes |
| Edit notes| Yes |
| Can register| Yes |

## Possible improvements 

+ good looking design using tailwind
+ seeding and migration
+ adding good responsive design 
+ dark and light mode(super optional)
+ rate limiter
+ sorting notes by date and title 
+ searching notes by title, user, description
+ drag & drop tickets 
+ multiple ticket selection 
+ testing
+ checking for lint via github actions 
+ user profiles(statistics, editing user info, changing email and password)

## Bugs 


## Resources 

+ [Laravel Docs](https://laravel.com/docs/12.x/installation)
+ [Laracast Tutorial](https://laracasts.com/series/php-for-beginners)

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

## License

Cannot be used for commercial purposes.