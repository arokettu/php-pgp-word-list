# Changelog

## 1.x

### 1.0.2

*Sep 26, 2024*

* Unexpected words generate `UnexpectedValueException` instead of `RuntimeException`

### 1.0.1

*Feb 23, 2024*

* Decoding will now fail if fuzzy parser gives ambiguous results
  (example: "acmo" cannot be reliably parsed because it's equidistant to "acme" and "ammo")

### 1.0.0

*Jan 4, 2024*

* Initial release
