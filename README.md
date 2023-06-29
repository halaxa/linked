GPT generated readme from repository analysis and a slight nudge in the right direction 😁:

# Listed

"Listed" is a PHP library that provides an implementation of a doubly-linked list. The list is sorted and can work with string and integer items. The library is meant to be used with PHP 8.0 and newer.

## Installation

Use composer to add the library to your project:

```bash
composer require halaxa/listed
```

The library requires PHP 8.0 or newer. See `composer.json` for more details on dependencies.

## Usage

The library provides `SortedLinkedListInt` and `SortedLinkedListString` classes for working with integer and string values respectively. Both classes implement `Countable` and `IteratorAggregate` interfaces. You can use the `get`, `first`, `last`, `insert`, `count`, and `getIterator` methods to manipulate and traverse the list.

Here is a simple example of using the `SortedLinkedListInt` class:

```php
use Listed\SortedLinkedListInt;

$list = new SortedLinkedListInt();

$list->insert(42);
$list->insert(24);
$list->insert(33);

echo $list->first(); // Outputs: 24
echo $list->get(1); // Outputs: 33
echo $list->last(); // Outputs: 42
```

## Development

The library comes with a set of Composer scripts and a `Makefile` for development purposes. Here is a brief description of the available commands:

- `composer tests` - Runs the test suite.
- `composer cs-check` - Checks the code style.
- `composer cs-fix` - Fixes the code style.

When running these commands via `make`, they are wrapped in a Docker container to ensure consistency across different development environments.

For example, you can use the following command to run the test suite on all supported PHP versions:

```bash
make tests-all
```

Please note that all `make` commands are essentially Composer commands wrapped in a Docker container.

The `Makefile` also includes a `release` command for creating a new release. It handles versioning, updates the `CHANGELOG.md` file, and pushes the release to the repository.

Before committing your changes or creating a release, make sure to run the `build` command:

```bash
make build
```

This command runs all necessary checks and tests.

For more information about the available commands and their usage, please refer to the `Makefile` and `composer.json` files.

## Planned Work

Linked is a work in progress with the following improvements planned:

- Implement an internal cursor for optimized insertions and semi-sequential reads.
- Implement a switch between LAZY and EAGER sort modes.
- Implement a custom compare function.

### Missing methods
- `shift(): int|string`: Removes the first element from the list and returns it.
- `pop(): int|string`: Removes the last element from the list and returns it.
- `insertMany(value[])`: Inserts multiple elements into the list at once.
- `remove(index): bool`: Removes the element at the specified index.
- `indexOf(value): int`: Finds the index of the specified value in the list.
- `clear(): void`: Removes all elements from the list.
- `clone(): self`: Creates a copy of the current list.
- `toArray(): array`: Converts the list to an array.

These features are expected to enhance the functionality of the library and provide users with more options for working with sorted linked lists. More information on these features will be provided as they are implemented.
