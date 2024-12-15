```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value);
    } else if (is_string($value)) {
      //Improved email parsing using regular expressions
      if (preg_match('/^(.+)@(.+)$/', $value, $matches)) {
        $data[$key] = ['user' => $matches[1], 'domain' => $matches[2]];
      }
    }
  }
  return $data;
}

$input = [
  'user1' => 'user@example.com',
  'user2' => 'another.user@subdomain.example.com',
  'user3' => ['email' => 'user.with.dots@example.org', 'name' => 'John Doe'],
  'user4' => 'invalid@email@address'
];

$output = processData($input);
print_r($output);
```