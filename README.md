# interview-parseapi-problem
This is a small application to illustrate on Backend(PHP exposing api) and frontend(Backbone) side.

We are using "Parse" for data strorage.
Ref: https://parseplatform.github.io/docs/rest/guide

This app does 2 things:
1. Create a restful service(api endpoints) using parse to store and retrieve data
This program expose following api endpoints and can be accessed by following url
-- GET /api/classes/interview/ 			    Get all interviews
-- GET /api/classes/interview/ktWOocoAqx    Get single interview
-- POST /api/classes/interview 			    Create an interview
-- PUT /api/classes/interview/ktWOocoAqx    Update an interview
-- DELETE /api/classes/interview/ktWOocoAqx Delete an interview

2. Create a frontend to populate the data and basic CRUD operation, this can be accessd by hitting root index.html

IMPORTANT:
In order to run this program mention your own app id and api key in "interview-parseapi-problem\model\Parse.php" around line no 6