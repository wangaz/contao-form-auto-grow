#Form Auto Grow for Contao

Automatically resizes textareas depending on their content for [Contao CMS](https://contao.org).

##CSS Tips

Use the following CSS-Styles to get most out of Auto Grow.

Hide the vertical scrollbar that sometimes appears in Webkit while resizing:
```css
textarea {
    overflow-y: hidden;
}
```

Hide the resize handle in Webkit:
```css
textarea {
    resize: none;
}
```

Animate the height via CSS-Transforms:
```css
textarea {
    -moz-transition-duration: 250ms;
    -webkit-transition-duration: 250ms;
    -o-transition-duration: 250ms;
    transition-duration: 250ms;
    -webkit-transition-property: height;
    -moz-transition-property: height;
    -o-transition-property: height;
    transition-property: height;
}
```
