```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } else if (is_string($value) && strpos($value, '@') !== false) {
      // This line is problematic
      $parts = explode('@', $value, 2); // Explodes only at the first '@'
      $data[$key] = [ 'user' => $parts[0], 'domain' => $parts[1]];
    }
  }
  return $data;
}

$input = [
  'user1' => 'user@example.com',
  'user2' => 'another.user@subdomain.example.com',
  'user3' => ['email' => 'user.with.dots@example.org', 'name' => 'John Doe'],
];

$output = processData($input);
print_r($output);
```