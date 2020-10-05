# Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

Previous releases are documented in [github releases](https://github.com/oscarotero/Get2text/releases)

## [5.5.1] - 2020-06-08
### Fixed
- Type error in which numeric filenames were converted to integers [#260]

## [5.5.0] - 2020-05-23
### Added
- New option `addReferences()` to configure the code scanners whether add or not references [#258]

### Changed
- BREAKING: Moved some code from `CodeScanner` to the new `FunctionsHandlersTrait` in order to better reuse.

## [5.4.1] - 2020-03-15
### Fixed
- PoGenerator includes the description and flags of the translations [#253]

## [5.4.0] - 2020-03-07
### Added
- Added `_` function to the list of functions scanned by default
- Added `Translations::setDescription()` and `Translations::getDescription()` methods [#251]
- Added `Translations::getFlags()` that returns a `Flags` object to assign flags to the entire po file [#251]

## [5.3.0] - 2020-02-18
### Added
- `Comments::delete()` and `Flags::delete()` methods [#247]

## [5.2.2] - 2020-02-09
### Fixed
- MoLoader with plurals [#246]

## [5.2.1] - 2019-12-08
### Fixed
- Multiline string in PoGenerator [#244]

## [5.2.0] - 2019-11-25
### Added
- New function `CodeScanner::extractCommentsStartingWith()` to extract comments from the code.

## [5.1.0] - 2019-11-11
### Added
- New function `CodeScanner::ignoreInvalidFunctions()` to ignore invalid functions instead throw an exception

## 5.0.0 - 2019-11-04
### Added
- New interfaces: `ScannerInterface` and `FunctionsScannerInterface`.

### Changed
- Moved the package and dependencies to [php-gettext](https://github.com/php-gettext) organization
- Minimum PHP version supported is 7.2
- Added php7 strict typing
- Extractors have been split into two different types of classes to import translations:
  - Scanners: To scan code files (like php, javascript, twig, etc) in order to collect gettext entries from many domains at the same time.
  - Loaders: To load a translation format such po, mo, json, xliff, etc
- Split the `Translation` and `Translations` classes in different sub-classes to handle comments, flags, references, etc. For example, instead `$translation->addComment('foo')` now it's `$translation->getComments()->add('foo')`.
- Simplified the options to merge translations with pre-configured options like `Merged::SCAN_AND_LOAD`.
- The headers of translations are always sorted alphabetically.
- Changed the signature of all classes and interfaces.

### Removed
- Extractors (now scanners and loaders), generators and translators were removed from this package and published as external packages, allowing to install only those that you need. Only Po and Mo formats are included by default.
- Removed magic classes like `Translations::fromPoFile` or `$translation->toMoFile()`. Now, the scanners, loaders and generators are independent classes that have to be instantiated.
- Removed `Merge::LANGUAGE_OVERRIDE` and `Merge::DOMAIN_OVERRIDE` contants

### Fixed
- Improved code quality
- The library is easier to extend
- Translation id can be independent of the context + original values, in order to be more compatible with Xliff format.

[#244]: https://github.com/php-gettext/Get2text/issues/244
[#246]: https://github.com/php-gettext/Get2text/issues/246
[#247]: https://github.com/php-gettext/Get2text/issues/247
[#251]: https://github.com/php-gettext/Get2text/issues/251
[#253]: https://github.com/php-gettext/Get2text/issues/253
[#258]: https://github.com/php-gettext/Get2text/issues/258
[#260]: https://github.com/php-gettext/Get2text/issues/260

[5.5.1]: https://github.com/php-gettext/Get2text/compare/v5.5.0...v5.5.1
[5.5.0]: https://github.com/php-gettext/Get2text/compare/v5.4.1...v5.5.0
[5.4.1]: https://github.com/php-gettext/Get2text/compare/v5.4.0...v5.4.1
[5.4.0]: https://github.com/php-gettext/Get2text/compare/v5.3.0...v5.4.0
[5.3.0]: https://github.com/php-gettext/Get2text/compare/v5.2.2...v5.3.0
[5.2.2]: https://github.com/php-gettext/Get2text/compare/v5.2.1...v5.2.2
[5.2.1]: https://github.com/php-gettext/Get2text/compare/v5.2.0...v5.2.1
[5.2.0]: https://github.com/php-gettext/Get2text/compare/v5.1.0...v5.2.0
[5.1.0]: https://github.com/php-gettext/Get2text/compare/v5.0.0...v5.1.0
