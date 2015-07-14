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

Just call the `generator.php` script with the secret to encrypt as a parameter. It will then output the encrypted
secret suitable for storage in the user's entry in the directory:

```
php generator.php ABCDEFGHIJ234567
```

For help on how to deploy encrypted secrets to the user's directory, see the *Feide two-factor deployment guide*.
