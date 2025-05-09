

# Custom API Caller

A lightweight PHP HTTP client built for making API requests, supporting `GET`, `POST`, `PUT`, and `PATCH` methods. This utility is designed for flexible usage, including passing data, handling custom headers (with optional Bearer token authentication), and parsing JSON responses.

---

## Features

- Supports HTTP methods: `GET`, `POST`, `PUT`, `PATCH`
- Handles **Authorization** with Bearer tokens
- Allows setting **custom request headers**
- Automatically handles **JSON encoding and decoding**
- Configurable **timeout** and **SSL verification**
- Simple and informative **error handling**

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/xofikul1337/Php-Custom-Api-Caller.git

2. Navigate to the project directory:

cd Php-Custom-Api-Caller


3. Ensure PHP is installed and running (PHP 7.4+ recommended).




---

Usage

GET Request

$response = callApi("https://api.example.com/users", "GET", ["limit" => 10]);

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}

POST Request

$data = [
    "name" => "John Doe",
    "email" => "john@example.com"
];

$response = callApi("https://api.example.com/register", "POST", $data);

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}

With Bearer Token

$response = callApi("https://api.example.com/profile", "GET", [], "your-access-token-here");

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}


---

Error Handling

The callApi() function returns an associative array. If an error occurs, the array will include an error key.

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}


---

License

This project is licensed under the MIT License. See the LICENSE.md file for details.


---

Credits

Custom HTTP Request Logic was created by Shofikul Islam.


