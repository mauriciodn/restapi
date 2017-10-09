# restApi
Small API that retrieves basic information of a facebook user, using Slim PHP Framework and Facebook Graph API v2.6

# Important
I couldn't make it work with latest Graph version 2.10, so I used an old app I've created back in time.
I had troubles with fb access token, and I couldn't persist it once a tester user is logged in.

### Installation and Testing

- Download or clone the project (e.g.  C:\Users\<username>\Documents\restapi)
- Open a terminal and go to the project's container folder (e.g.  C:\Users\<username>\Documents)
- Use Built-in web server. Execute:
    ```sh    
    php -S 127.0.0.1:80
    ```
 - Open a browser and hit http://localhost/restapi/v1/profile/{id}
 - Click in "Log in with Facebook!"
 - Check the response
