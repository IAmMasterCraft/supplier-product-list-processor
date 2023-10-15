# Supplier Product List Processor

The Supplier Product List Processor is a PHP application that parses and processes product data from different file formats, creating `Product` objects and generating unique combinations of product attributes. This README provides instructions for running the application and an overview of its features.

## Table of Content
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
  - [Command Syntax](#command-syntax)
  - [Examples](#examples)
- [Supported File Formats](#supported-file-formats)
- [Features](#features)
- [Testing](#testing)
- [Author](#author)
- [License](#license)

## Requirements

- PHP 7+
- Composer (for managing dependencies)

## Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/supplier-product-list-processor.git
   ```

2. Navigate to the project directory:

   ```bash
   cd supplier-product-list-processor
   ```

3. Install Composer dependencies:

   ```bash
   composer install
   ```

## Usage
The application supports parsing data from `CSV`, `JSON`, and `XML` files. You can use the `parser.php` script to process these files and generate unique combinations of product attributes.

### Command Syntax
    ```bash
    php parser.php --file <input-file> --unique-combinations <output-file>
    ```
- <input-file>: The path to the input data file (CSV, JSON, or XML).
- <output-file>: The path to the output file where unique combinations will be saved.

### Examples
Parse a CSV file and generate unique combinations:

    ```bash
    php parser.php --file example.csv --unique-combinations combination_count.csv
    ```

Parse a JSON file and generate unique combinations:

    ```bash
    php parser.php --file example.json --unique-combinations combination_count.json
    ```

Parse an XML file and generate unique combinations:

    ```bash
    php parser.php --file example.xml --unique-combinations combination_count.xml
    ```

## Supported File Formats
The application supports the following file formats for input data:

- CSV (Comma-Separated Values)
- TSV (Tab-Separated Values)
- JSON (JavaScript Object Notation)
- XML (Extensible Markup Language)

## Features
- Parses data from CSV, TSV, JSON, and XML files.
- Generates unique combinations of product attributes.
- Supports different file formats for input data.
- Exception handling for missing required fields.
- Provides unit tests for verification.

## Testing
To run the unit tests, use the following command:

    ```bash
    composer test
    ```

Author
[IAmMasterCraft](https://github.com/IAmMasterCraft)

License
This project is open-source and available under the MIT License.