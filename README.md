# DuckDuckGoWrapper
This creates a very simple wrapper that fixes some of the more annoying bugs in DuckDuckGo

# What is this?

I use DuckDuckGo because I love the bangs (like `!yt` for youtube search, or `!gi` for Google Images,
or `!wa` for WolframAlpha. But I'm not quite satisfied how it's implemented.

When I search something like `x = 5 * (3 +x)!wa`, it does not recognize it correctly, because it cannot
tell that `!wa` is a bang after a non-letter-character like `(` or `)`, so you have to manually insert
spaces.

Also, when I ddg something like `5+5`, it does not show the calculator by default, and it needs
another click. This is automatically redirected to the page where the calculator is shown if available.

Also, I missed the option for the german eBay-Kleinanzeigen (`!ekz`) and german Wikipedia (`!dwiki`).

This php script checks for bangs and automatically inserts spaces in front of them so you don't have to,
and it redirects to eBay-Kleinanzeigen-search (like `thinkpad!ekz`) or german Wikipedia.

# How does this work?

It just takes one parameter, `?param=...`, which gets checked, modified and redirected. That's all.

# How to set up

You need to set up an apache server, either on your localhost, or on a server you trust, and add

```
localhost/search/index.php?param=%s
```

to your search. With firefox, I was able to to this with https://addons.mozilla.org/en-US/firefox/addon/add-custom-search-engine/
but it should also be possible with Chrome.
