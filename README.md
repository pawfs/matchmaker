# Solution for Matchmaker 

Modified solution for the Matchmaker project from the [Programmez-en-oriente-objet-PHP course](https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php).

## Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/pawfs/matchmaker.git
    cd matchmaker
    ```

2. **Install dependencies:**
    Make sure you have [Composer](https://getcomposer.org/) installed. Then run:
    ```sh
    composer install
    ```

3. **Set up the environment:**
    Ensure you have a local server like XAMPP or MAMP running. Place the project in the server's root directory (e.g., `htdocs` for XAMPP).

4. **Run the application:**
    Open your browser and navigate to `http://localhost/matchmaker/index.php`.

5. **Run tests:**
    To run the PHPUnit tests, execute:
    ```sh
    ./vendor/bin/phpunit --configuration phpunit.xml
    ```

Now you should be able to see the Matchmaker project running and the tests passing.

## Pertinent Modifications

* Added minmal display for `index.php`
* Added different example (using different ratios)
* Added test cases for the existing classes, using PHPUnit