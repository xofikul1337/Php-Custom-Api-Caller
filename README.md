
````
# Custom API Caller

This is a custom PHP HTTP client built for making API requests with support for `GET`, `POST`, `PUT`, and `PATCH` methods. The client is designed to handle various use cases, including passing data, handling headers (with optional authentication), and parsing JSON responses.

---

## Features

- Supports multiple HTTP methods: `GET`, `POST`, `PUT`, `PATCH`.
- Handles **Authorization** with Bearer tokens.
- Allows setting **custom request headers**.
- Handles **JSON encoding and decoding**.
- Configured with **timeout** and **SSL verification**.
- Simple error handling with detailed error messages.

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/repository-name.git
````

2. Navigate to the project directory:

   ```bash
   cd repository-name
   ```

3. Make sure you have PHP installed and running on your machine (PHP 7.4+ recommended).

---

## Usage

Here is an example of how you can use the `callApi()` function:

### `GET` Request

```php
$response = callApi("https://api.example.com/users", "GET", ["limit" => 10]);

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}
```

### `POST` Request

```php
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
```

### With Bearer Token

```php
$response = callApi("https://api.example.com/profile", "GET", [], "your-access-token-here");

if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response);
}
```

---

## Error Handling

The `callApi()` function will return an associative array with either the data or an error message. Here's how you can check for errors:

```php
if (isset($response['error'])) {
    echo "Error: " . $response['error'];
} else {
    print_r($response); // This is the API response.
}
```

---

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

---

## Credits

This project [Custom Http Request Logic] was created by **Shofikul Islam**.

