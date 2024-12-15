# PHP Explode Function Bug

This repository demonstrates a common but subtle bug in PHP involving the `explode` function and its interaction with email addresses containing multiple '@' symbols within nested arrays.  The provided code attempts to extract the username and domain parts of email addresses but fails when an email address contains more than one '@' symbol.

## Bug Description

The primary issue lies in the `explode` function, which only splits a string at the first occurrence of the delimiter.  When processing email addresses with multiple '@' symbols (e.g., user@subdomain@domain.com), only the part before the first '@' is considered the username, leading to incorrect parsing.

## Solution

The provided solution addresses the issue by using regular expressions to correctly parse email addresses, ensuring accurate username and domain extraction regardless of the number of '@' symbols present in the email address. The solution also efficiently handles nested arrays for a robust processing pipeline.