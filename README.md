# Clipboard4wiki_SyntaxHighlight

This is a MediaWiki extension that is an edited version of [Clipboard4wiki]("https://github.com/narizhny/Clipboard4wiki") that integrates the clipboard button with the SyntaxHighlight MediaWiki extension adding a clipboard button to the highlighted code.

<p align='left'>
<img src="https://github.com/esteban180sx/Clipboard4wiki_SyntaxHighlight/blob/main/screenshot.png?raw=true">
</p>

## Requirements

You need to have installed the MediaWiki [SyntaxHighlight extension](https://www.mediawiki.org/wiki/Extension:SyntaxHighlight)

## Usage

This extension uses the clipboard functionality of Clipboard4wiki and the lang parameter of SyntaxHighlight

`<clippy lang="python">print('Hello World')</clippy>`

The list of supported languages can be found [here](https://www.mediawiki.org/wiki/Extension:SyntaxHighlight#Supported_languages)

## Installation

- Download Clipboard4wiki_SyntaxHighlight in your extensions/ folder.
- Add line to your LocalSettings.php:<br/>
  `require_once "$IP/extensions/Clipboard4wiki_SyntaxHighlight/Clipboard4wiki_SyntaxHighlight.php";`
