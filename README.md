# Feide two-factor secret generator

A simple script demonstrating how to generate secrets suitable to use for two-factor authentication in Feide.

The secrets **must** be random strings of 16 base-32-encoded characters, that meaning:

* uppercase ASCII letters, from A to Z, both included, and
* digits from 2 to 7, both included.

There's no restriction to how many letters or digits should be used, nor any other kind of restriction besides the
length of the string. However, we recommend to use completely random secrets.

## Installation

Clone this repository, then [download composer](https://getcomposer.org/download/) to the same directory, and run it:

```
./composer.phar install
```

## Usage

Just call the `generator.php` script and it will output an encrypted secret suitable for storage in the user's entry
in the directory, as well as a QR code that can be scanned by an authenticator application:

```
php generator.php
```

You can also specify the secret you would like to use, as well as a label to be added to the secret and the QR code.
Use the following command line options:

* `-l` (or `--label`) to specify a label.
* `-s` (or `--secret`) to specify the secret.

For example:

```
php generator.php --secret ABCDEFGHIJ234567 --label "My Code Generator"
```

For help on how to deploy encrypted secrets to the user's directory, see the *Feide two-factor deployment guide*.

