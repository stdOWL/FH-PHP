# PHP-PSP Project

This project provides a set of APIs for authentication and transaction management.

## Live Demo
[Heroku](https://php-psp-5b4153304289.herokuapp.com/).


## Endpoints

### Authentication

#### Login

- **URL:** `/api/auth/login`
- **Method:** `POST`
- **Request Body:**
    ```json
    {
        "email": "demo@financialhouse.io",
        "password": "cjaiU8CV"
    }
    ```
- **Tests:**
    - Response status code is 200
    - Response contains `access_token`

### Transactions

#### Get Transaction

- **URL:** `/api/transaction/{transactionId}`
- **Method:** `GET`
- **Headers:**
    - `Authorization: {{access_token}}`

#### Get Client

- **URL:** `/api/transaction/{transactionId}/client`
- **Method:** `GET`
- **Headers:**
    - `Authorization: {{access_token}}`

#### List Transactions

- **URL:** `/api/transaction/list`
- **Method:** `POST`
- **Headers:**
    - `Authorization: {{access_token}}`
- **Request Body:**
    ```json
    {
        "fromDate": "2010-01-01",
        "toDate": "2024-01-01"
    }
    ```

#### Report Transactions

- **URL:** `/api/transaction/report`
- **Method:** `POST`
- **Headers:**
    - `Authorization: {{access_token}}`
- **Request Body:**
    ```json
    {
        "fromDate": "2015-07-01",
        "toDate": "2023-10-01"
    }
    ```

## Postman Collection

You can import the provided Postman collection to test the endpoints.

```json
{
    "info": {
        "_postman_id": "7d4f5f79-565f-47eb-9711-aa3e66f9d37e",
        "name": "PHP-PSP",
        "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
        "_exporter_id": "30369023"
    },
    "item": [
        {
            "name": "Auth",
            "item": [
                {
                    "name": "Login",
                    "event": [
                        {
                            "listen": "test",
                            "script": {
                                "exec": [
                                    "// Test for response code and access_token presence",
                                    "pm.test(\"Response status code is 200\", function () {",
                                    "  pm.response.to.have.status(200);",
                                    "});",
                                    "",
                                    "pm.test(\"Response contains access_token\", function () {",
                                    "  pm.expect(pm.response.json()).to.have.property('access_token');",
                                    "  pm.environment.set(\"access_token\", pm.response.json().access_token);",
                                    "});",
                                    ""
                                ],
                                "type": "text/javascript",
                                "packages": {}
                            }
                        }
                    ],
                    "request": {
                        "method": "POST",
                        "header": [],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"email\":\"demo@financialhouse.io\",\n    \"password\":\"cjaiU8CV\"\n}",
                            "options": {
                                "raw": {
                                    "language": "json"
                                }
                            }
                        },
                        "url": {
                            "raw": "{{BASE_URL}}/auth/login",
                            "host": [
                                "{{BASE_URL}}"
                            ],
                            "path": [
                                "auth",
                                "login"
                            ]
                        }
                    },
                    "response": []
                }
            ]
        },
        {
            "name": "Transaction",
            "item": [
                {
                    "name": "Get Transaction",
                    "request": {
                        "method": "GET",
                        "header": [
                            {
                                "key": "Authorization",
                                "value": "{{access_token}}",
                                "type": "text"
                            }
                        ],
                        "url": {
                            "raw": "{{BASE_URL}}/transaction/1067301-1675430916-3",
                            "host": [
                                "{{BASE_URL}}"
                            ],
                            "path": [
                                "transaction",
                                "1067301-1675430916-3"
                            ]
                        }
                    },
                    "response": []
                },
                {
                    "name": "Get Client",
                    "request": {
                        "method": "GET",
                        "header": [
                            {
                                "key": "Authorization",
                                "value": "{{access_token}}",
                                "type": "text"
                            }
                        ],
                        "url": {
                            "raw": "{{BASE_URL}}/transaction/1067301-1675430916-3/client",
                            "host": [
                                "{{BASE_URL}}"
                            ],
                            "path": [
                                "transaction",
                                "1067301-1675430916-3",
                                "client"
                            ]
                        }
                    },
                    "response": []
                },
                {
                    "name": "List Transactions",
                    "request": {
                        "method": "POST",
                        "header": [
                            {
                                "key": "Authorization",
                                "value": "{{access_token}}",
                                "type": "text"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"fromDate\":\"2010-01-01\",\n    \"toDate\":\"2024-01-01\"\n}",
                            "options": {
                                "raw": {
                                    "language": "json"
                                }
                            }
                        },
                        "url": {
                            "raw": "{{BASE_URL}}/transaction/list",
                            "host": [
                                "{{BASE_URL}}"
                            ],
                            "path": [
                                "transaction",
                                "list"
                            ]
                        }
                    },
                    "response": []
                },
                {
                    "name": "Report Transactions",
                    "request": {
                        "method": "POST",
                        "header": [
                            {
                                "key": "Authorization",
                                "value": "{{access_token}}",
                                "type": "text"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"fromDate\": \"2015-07-01\",\n    \"toDate\": \"2023-10-01\"\n}",
                            "options": {
                                "raw": {
                                    "language": "json"
                                }
                            }
                        },
                        "url": {
                            "raw": "{{BASE_URL}}/transaction/report",
                            "host": [
                                "{{BASE_URL}}"
                            ],
                            "path": [
                                "transaction",
                                "report"
                            ]
                        }
                    },
                    "response": []
                }
            ]
        }
    ]
}
```