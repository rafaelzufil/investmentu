# IU Syndication Aggregator

Aggregate articles from syndication publishers.

## Table of Contents

- [Installation](#installation)

## Installation

- rename/copy `iu-syndication-configs-sample.php` to `iu-syndication-configs.php`
- update IU_SYNDICATION_API_BASE_URI
- update IU_SYNDICATION_API_KEY
- OR
- copy the 2 defines to wp-config.php

- create directories in shared: shared/wp-content/plugins/iu-syndication-aggregator
- add file to capistranio deploy.rb linked_files:  'wp-content/plugins/iu-syndication-aggregator/iu-syndication-configs.php'