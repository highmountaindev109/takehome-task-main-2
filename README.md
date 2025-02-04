This repository contains an application for viewing and editing text documents. Users of the application
can:

* Create new pages
* Edit any existing page
* View a list of existing content

## Your task

Complete TODO A through E in the file `api.php` and TODO A through E in `index.php` (please ignore any other TODO comments you might see, including those in other files, for the purposes of this exercise). Please note the README comments on using good commit messages. Send the recruiter a ZIP file of the git repository when you have finished. We are recommending you spend no more than a couple of hours on this. Thank you!

Your task is to work through TODOs.
For any TODOs that you didn't have time to complete, please leave some comments
informing us of your approach if you had more time.

Please use your creativity and judgment to show us how you fix bugs, add
features, document code, and refactor a not-so-well-written codebase. Feel free
to create new files if it helps organize your code better.


## How your response will be evaluated

We are most interested in seeing how you think about the TODOs rather than whether
you have written perfect code in a very limited amount of time. Specifically,
here are some areas we will broadly check:

* Following the instructions: Have you done what was asked by the TODOs?
* Code quality: Was the code changed to be cleaner than before and is any new code that was added clean? (e.g. Writing clear comments, logical naming, appropriate function length/scope etc. )
* Accessibility: Did you consider the accessibility implications of your changes?
* Security: Did you consider the security implications of your changes?
* Performance: Did you consider the performance implications of your changes?

We will also check that you have used Git to make your changes with [quality commit message(s)](https://www.mediawiki.org/wiki/Gerrit/Commit_message_guidelines/en).

Additionally, we will use this exercise to ask related questions in the
in-person technical interview.

### Note

Please do not use any additional external libraries for this exercise.

## Usage

Download [composer](https://getcomposer.org/), then:

1. `composer install` – installs dependencies for the application
2. `composer serve` - Serves the application
   1. Web UI is available at http://localhost:8989.
   2. API is available at http://localhost:8989/api.php
   3. If you need to change the port, you can do that in `composer.json`
3. `composer seed` – Generate seed content for the application
4. `composer test` – Lint files and run tests

## Submission

Please create a ZIP file of the git repository and send back to the recruiter.
