# Radiocharm
A lightweight jQuery plugin that gives charm to radio boxes and allows custom labels, icons, and ability to un-check selection by clicking again on the selected radio box.

## Demo / Examples

Placeholder for a link to demo / examples.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id mauris vitae ligula ultrices scelerisque. Nunc at gravida dui. Morbi dapibus pretium efficitur. Nunc tempus aliquet pulvinar. In vel elit id mauris eleifend pulvinar. Suspendisse convallis nec tellus at hendrerit. Quisque aliquet odio nulla, ut porttitor metus iaculis eu.

[Radiocharm Demo / Examples](https://coynem.com/radiocharm/)

* [Default Implementation](https://coynem.com/radiocharm/#default_implementation)
* [Background Color Implementation](https://coynem.com/radiocharm/#background_color_implementation)
* [Icon Implementation](https://coynem.com/radiocharm/#icon_implementation)
* [Uncheckable Implementation](https://coynem.com/radiocharm/#uncheckable_implementation)

## Usage

### Default Implementation
Default implementation using data-radiocharm-label as the label for each option.

~~~ html
<input data-radiocharm-label="Label Here" type="radio" />
~~~

~~~ js
$(document).ready(function(){
  $('input:radio').radiocharm();
});
~~~

### Background Color Implementation
Background color implementation using **data-radiocharm-background-color** to change the background colors for each option. Additionally, you can use **data-radiocharm-text-color** if you need to change the color of the text.

~~~ html
<input data-radiocharm-label="Label Here" data-radiocharm-background-color="c9302c" type="radio" />
~~~

~~~ js
$(document).ready(function(){
  $('input:radio').radiocharm();
});
~~~

### Icon Implementation
Icon implementation using **data-radiocharm-icon** to change the icon for each option.

~~~ html
<input data-radiocharm-label="Label Here" data-radiocharm-icon="thumbs-up" type="radio" />
~~~

~~~ js
$(document).ready(function(){
  $('input:radio').radiocharm();
});
~~~

### Uncheckable Implementation
Uncheckable implementation using **uncheckable** setting to be passed over on initialization. **Default** is false.

~~~ html
<input data-radiocharm-label="Label Here" type="radio" />
~~~

~~~ js
$(document).ready(function(){
  $('input:radio').radiocharm({
    uncheckable: true
  });
});
~~~

## Dependencies

[Font Awesome](http://fontawesome.io)

Font Awesome gives you scalable vector icons that can instantly be customized - size, color, drop shadow, and anything that can be done with the power of CSS.

~~~ html
<link href=https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" rel="stylesheet" />
~~~
