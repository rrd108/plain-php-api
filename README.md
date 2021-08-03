# Plain PHP REST API

## Videó
[Vanilla PHP REST API 1 óra alatt](https://www.youtube.com/watch?v=APehxISKSOk)

## Endpoints

| URL           | HTTP method | Auth | JSON Response       |
|---------------|-------------|------|---------------------|
| ?users=login  | POST        |      | user's token        |
| ?users        | GET         |  Y   | all users           |
| ?products     | GET         |      | all products        |
| ?products     | POST        |  Y   | new product added   |
| ?products     | PATCH       |  Y   | edited product      |
| ?products     | DELETE      |  Y   | true / false        |

