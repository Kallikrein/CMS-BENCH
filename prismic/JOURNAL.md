### UI

The prismic tool is accessed through a web ui.

### create repository

bench-prismic

### cli

npx -p prismic-cli prismic init bench-prismic

Outputs of node and react are in respective folders

### outputs

the CMS is clearly not headless.
It gives the pre packaged application + API consumer without any hint on the website on how to consumate API ourselves.

Adherence can be expected to be maximum ! It's a definite WARNING before engaging any HR in such a binding API.

The output app relies on prismic SDK modules shipped with the front end for API consumption. It's agnostic as long as there is a functional SDK, but not REST-level agnostic.

The react version out of the box is 16.2, wich is now 2 years old and require 7 minor version upgrade. A lot of deprecations is to be expected.
Browsing the source makes it even more painfully obvious, outdated or ill advised patterns (like object oriented statics ???) litter the source.

### data structure

Obfuscation behind proprietary API and SDK makes it hard to audit

### performance

On a side note, it's funny to consider that the prismic website (docs and dashboard) is incredibly slow, timing out regularly
It's a bad omen for a product supposed to host and own our data and contents

### """"repository""""

Apart from (ab)using a git concept, the repository is merely a namespace.

### Trade off consideration

features provided
