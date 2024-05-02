This laravel backend is basically a simple api that is for a shop that sells dog food and sends invoices.

For now it contains the following:

An authentication handler. Basically a register, login, logout and laravel's csrf protection token. Each api request is guarded by sanctum and requires both the csrf token and the login token

A CRUD for the following: Dog breed, which contains information for the specific dog.
A products catalaog which contains the prodcut name, price and for which dog it is suited for.
A stockpile table which is linked to a product. It will allow our frontend to know if a given product is out of stock or how much the customer can order.
And a semi-hardcoded invoice generator. Right now the invoices is just a basic router get call to a invoice controller which retrievs the product with an id of 2.
Muiltiplies it by 2 (as in 2 items have been purchased). And sends it to a blade file which displays an invoice table (created on the server).
After that the invoice file can be sent to our frontend and in our frontend(doesn't exist yet) we can print it out.

For this example I have used the following features in laravel: Controllers, Models, Eloquent ORM, Data validation has been done in our Requests folder, added seeder and migration files to create the required database tables and to seed them with some basic data.

No unit tests have been made, no frontend has been made

