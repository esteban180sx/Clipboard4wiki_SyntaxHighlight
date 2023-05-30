<?php

if( !defined( 'MEDIAWIKI' ) ) {
    echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
    die( -1 );
}

$wgExtensionCredits['parser extensions'][] = array(
    'path'           => __FILE__,
    'name'           => 'Clipboard4wiki_SyntaxHighlight',
    'version'        => '1.0.0',
    'author'         => '',
    'url'            => '',
    'descriptionmsg' => 'Clipboard for SyntaxHighlight_GeSHi extension based on Clipboard4wiki extension'
);

$wgClipboard4wikiPath = "$wgScriptPath/extensions/Clipboard4wiki_SyntaxHighlight";

$wgHooks['ParserFirstCallInit'][] = 'wfClipboard4wikiInit';

function wfClipboard4wikiInit( Parser $parser ) {
    global $wgOut, $wgJsMimeType, $wgClipboard4wikiPath;

    $parser->setHook( 'clippy', 'wfClipboard4wikiRender' );
    $wgOut->addScript("<script type=\"{$wgJsMimeType}\" src=\"$wgClipboard4wikiPath/clipboard4wiki.js\"></script>\n");
    $wgOut->addStyle("$wgClipboard4wikiPath/style.css", "screen");

    return true;
}

function wfClipboard4wikiRender( $input, array $args, Parser $parser, PPFrame $frame ) {
    global $wgClipboard4wikiPath;

    $link = htmlspecialchars($input);
    $link = str_replace(array("\r", "\n"),'<¬>', $link);

   
    $html .= "<div style=\"position: relative;\">"; // Wrap in a container div with relative position
    $html .= $parser->recursiveTagParse("<syntaxhighlight lang=\"{$args['lang']}\">$input</syntaxhighlight>", $frame); // Apply code highlighting to $input within <syntaxhighlight> tag
    $html .= "<button class=\"btn\" style=\"position: absolute; top: 0; right: 0;\" tooltip=\"Copy\" onClick=\"clipboard4wiki('".addslashes(str_replace(PHP_EOL, '\\n', htmlspecialchars($link, ENT_QUOTES)))."')\"><img src=\"$wgClipboard4wikiPath/clipboard.svg\" width=\"13\" /></button>"; // Button embedded outside of <syntaxhighlight> tag, positioned absolutely on top of the container div
    $html .= "</div>"; // Closing container div

    return $html;
}

