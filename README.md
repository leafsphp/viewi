<!-- markdownlint-disable no-inline-html -->

<p align="center">
  <br><br>
  <img src="https://leafphp.dev/logo-circle.png" height="100"/>
  <img src="https://viewi.net/logo.svg" height="100"/>
  <h1 align="center">Leaf Viewi Module</h1>
  <br><br>
</p>

[![Latest Stable Version](https://poser.pugx.org/leafs/viewi/v/stable)](https://packagist.org/packages/leafs/viewi)
[![Total Downloads](https://poser.pugx.org/leafs/viewi/downloads)](https://packagist.org/packages/leafs/viewi)
[![License](https://poser.pugx.org/leafs/viewi/license)](https://packagist.org/packages/leafs/viewi)

This module allows you to quickly and easily integrate Viewi into your Leaf apps without any pain at all.

## Installation

You can easily install Leaf Viewi using the [Leaf CLI](https://cli.leafphp.dev):

```sh
leaf install viewi
```

Or with [Composer](https://getcomposer.org/).

```bash
composer require leafs/viewi
```

## Basic Usage

After installing the module, you can setup a `viewi-app/components` folder as prescribed by the Viewi docs. In there you can create your Viewi components. Back in your Leaf entry point, all you need to do is initialize the Leaf Viewi module and add your viewi routes.

```php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/viewi-app/components/HomePage.php';

viewi()->init();

// This is a viewi route.
viewi()->get('/', HomePage::class);

app()->get('/something', function () {
  echo 'This is a Leaf route';
});

app()->run();
```

By default, the Leaf Viewi module will handle the configuration for Viewi, so you don't need to anything unless you want to use your own setup. In that case, you can pass the Viewi config into `viewi()->init();`:

```php
<?php

use Viewi\PageEngine;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/viewi-app/components/HomePage.php';

viewi()->init([
  PageEngine::SOURCE_DIR => __DIR__ . '/ViewiApp/Components',
  PageEngine::SERVER_BUILD_DIR =>  __DIR__ . '/ViewiApp/build',
  PageEngine::PUBLIC_ROOT_DIR => __DIR__,
  PageEngine::DEV_MODE => true,
  PageEngine::RETURN_OUTPUT => true,
  PageEngine::COMBINE_JS => true
]);

viewi()->get('/', HomePage::class);

app()->get('/something', function () {
  echo 'This is a Leaf route';
});

app()->run();
```

## Contributing

We are glad to have you. All contributions are welcome! To get started, familiarize yourself with our [contribution guide](https://leafphp.dev/community/contributing.html) and you'll be ready to make your first pull request 🚀.

To report a security vulnerability, you can reach out to [@mychidarko](https://twitter.com/mychidarko) or [@leafphp](https://twitter.com/leafphp) on twitter. We will coordinate the fix and eventually commit the solution in this project.

### Code contributors

<table>
	<tr>
		<td align="center">
			<a href="https://github.com/ivanvoitovych/">
				<img src="https://avatars.githubusercontent.com/u/9718423?v=4" width="120px" alt=""/>
				<br />
				<sub><b>Ivan Voitovych</b></sub>
			</a>
		</td>
    <td align="center">
			<a href="https://github.com/mychidarko">
				<img src="https://avatars.githubusercontent.com/u/26604242?v=4" width="120px" alt=""/>
				<br />
				<sub>
					<b>Michael Darko</b>
				</sub>
			</a>
		</td>
	</tr>
</table>

## 🤩 Sponsoring Leaf

Your cash contributions go a long way to help us make Leaf even better for you. You can sponsor Leaf and any of our packages on [open collective](https://opencollective.com/leaf) or check the [contribution page](https://leafphp.dev/support/) for a list of ways to contribute.

And to all our existing cash/code contributors, we love you all ❤️

### Cash contributors

<table>
	<tr>
		<td align="center">
			<a href="https://opencollective.com/aaron-smith3">
				<img src="https://images.opencollective.com/aaron-smith3/08ee620/avatar/256.png" width="120px" alt=""/>
				<br />
				<sub><b>Aaron Smith</b></sub>
			</a>
		</td>
		<td align="center">
			<a href="https://opencollective.com/peter-bogner">
				<img src="https://images.opencollective.com/peter-bogner/avatar/256.png" width="120px" alt=""/>
				<br />
				<sub><b>Peter Bogner</b></sub>
			</a>
		</td>
		<td align="center">
			<a href="#">
				<img src="https://images.opencollective.com/guest-32634fda/avatar.png" width="120px" alt=""/>
				<br />
				<sub><b>Vano</b></sub>
			</a>
		</td>
    <td align="center">
      <a href="#">
        <img
          src="https://images.opencollective.com/guest-c72a498e/avatar.png"
          width="120px"
          alt=""
        />
        <br />
        <sub><b>Casprine</b></sub>
      </a>
    </td>
	</tr>
  <tr>
    <td align="center">
			<a href="https://github.com/doc-han">
				<img src="https://avatars.githubusercontent.com/u/35382021?v=4" width="120px" alt=""/>
				<br />
				<sub><b>Farhan Yahaya</b></sub>
			</a>
		</td>
    <td align="center">
			<a href="https://www.lucaschaplain.design/">
				<img src="https://images.opencollective.com/sptaule/aa5f956/avatar/256.png" width="120px" alt=""/>
				<br />
				<sub><b>Lucas Chaplain</b></sub>
			</a>
		</td>
  </tr>
</table>
