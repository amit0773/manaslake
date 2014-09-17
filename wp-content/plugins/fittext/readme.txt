=== FitText.js, a jQuery plugin for inflating web type ===
Contributors: Ramoonus
Donate link: http://www.ramoonus.nl/donate/
Tags: html5, css3, javascript, jquery, fittext
Requires at least: 3.0.0
Tested up to: 3.9.1
Stable tag: 1.2

FitText makes font-sizes flexible. Use this plugin on your responsive design to achieve scalable headlines that fill the width of the parent element.
== Description ==
Fixtext is a JavaScript utility that emulates CSS3 pseudo-classes and attribute selectors in Internet Explorer 6-8.  

== Installation ==
1. Upload `fixtext/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

= Implementation =
Here is a simple FitText setup:

   	<script>
      $("#responsive_headline").fitText();
    </script>

[Pretty Cool](http://www.hulu.com/watch/194733/saturday-night-live-miley-cyrus-show). Your text should now resize based on the width of the parent element. By default: *Font-size = 1/10th of the parent element's width*.

= The Compressor= 
If your text is resizing poorly, you'll want to turn tweak up/down "The Compressor". It works a little like a guitar amp. The default is `1`.

    $("#responsive_headline").fitText(1.2); // Turn the compressor up   (text shrinks more aggressively)
    $("#responsive_headline").fitText(0.8); // Turn the compressor down (text shrinks less aggressively)
    
This will hopefully give you a level of "control" that might not be pixel perfect, but scales smoothly & nicely.

=_new:_ minFontSize & maxFontSize =
FitText now allows you to specify two optional pixel values: `minFontSize` and `maxFontSize`. Great for situations when you want responsive text but also need to preserve hierarchy.

    $("#responsive_headline").fitText(1.2, { minFontSize: '20px', maxFontSize: '40px' })

= CSS Tips =

* Make sure your headline is `display: block;` or 	`display: inline-block;` with a specified width, i.e. `width: 100%`. 
* Be ready to tweak till everything balances out.
* FitText now ignores your CSS file's font-size, but be sure to set one as a non-javascript fallback.

== Frequently Asked Questions == 
None at this moment.

== Upgrade Notice == 
= 1.2 =
* Updates the Javascript library

== Changelog ==
= 1.2 =
* Updates the Javascript library

= 1.1 =
* FitText now ignores font-size and has minFontSize & maxFontSize options
* Code Cleanup (less code = faster)
* Removed jQuery UI loader
* Readme improvement: see installation tab

= 1.0.0 =
* Initial version, based on version 1.0 of the javascript