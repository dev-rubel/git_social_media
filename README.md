
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Introduction
Ever thought about the tremendous popularity of social networks among modern Internet users?
Starting to create a social network right now, you get the opportunity to join the top wealthiest people list in several years!

Lets see what steps you should take to get closer to your goals.
In your social network, there are two types of entities.
1. Person
2. Page

A person can create a page, can follow another person, or a page. A page can neither follow a person nor another page.

In other words, both a person or a page can have zero or more followers.

Both a person and a page can post a status update. When they do, their followers will see the post on their newsfeed. As mentioned above, a person can be a follower thus has a newsfeed, but a page cannot be a follower and thus does not have a newsfeed.

There can be any number of persons and pages in this social network.

Based on the above definition, both a person and a page is followable

## Task is implement the following api`s
> **api/auth/register**

- **Purpose**: Register the person to the system
- **Requirement**:
	- HTTP Method: POST
	- Request: [ First Name, Last Name, Email, Password ]
- **Response**: Person Object

> **api/auth/login**

- **Purpose**: Login the person
- **Requirement**:
	- HTTP Method: POST
	- Request: [Email, Password ]
- **Response**:
	- Bearer authorization token
	- User object.

> **api/page/create**

- **Purpose**: Logged in person create a page
- **Requirement**:
	- HTTP Method: POST
	- Request: [page_name(string) ]
- **Response**: Any message

> **api/follow/person/{personId}**

- **Purpose**: Logged in person will follow another person of given id
- **Requirement**:
	- HTTP Method: PUT/POST
- **Response**: Any message

> **api/follow/page/{pageId}**

- **Purpose**: Logged in person will follow another person of given id
- **Requirement**:
	- HTTP Method: PUT/POST
- **Response**: Any message

>** api/person/attach-post**

- **Purpose**: Logged in person publishes a post.
- **Requirement**:
	- HTTP Method: POST
	- Request: [ post_content(string) ]
- **Response**: Any message

> **api/page/{pageId}/attach-post**

- **Purpose**: Logged in person publishes a post to a page owned by him/her
- **Requirement**:
	- HTTP Method: POST
	- **Request**: [ post_content(string) ]
- Response: Any message

>** api/person/feed**

- **Purpose**: Get the feed for the currently logged in person
- **Requirement**:
	- HTTP Method: GET
- **Response**: Feed Object

## Instructions
1. Update DB info in ```.env```
2. ```composer install```
3. ```php artisan migrate```
4. [Imort postman collection (root directory)](https://github.com/dev-rubel/git_social_media/blob/development/SocialMedia.postman_collection.json "Imort postman collection (root directory)")
5. Then run it.
