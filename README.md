<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
TODO:  Add these back once we have our own shields instance.
-->
<!--
[![Contributors][contributors-shield]][contributors-url]
[![Issues][issues-shield]][issues-url]
-->

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/PaidSites/investmentu2019">
    <img src="images/logo.jpg" alt="IU Brand Logo">
  </a>

  <h3 align="center">InvestmentU.com</h3>

  <p align="center">
    Repository for theming and deploying the InvestmentU.com site.
    <br />
    <a href="https://github.com/PaidSites/investmentu2019"><strong>Explore the docs »</strong></a>
    <br />
        View the <a target="_blank" href="https://dev.investmentu.com">STAGING</a> / <a target="_blank" href="https://investmentu.com">PRODUCTION</a> Site
        <br />
    <br />
    <a href="https://github.com/PaidSites/investmentu2019/issues">Report a Bug</a>
    ·
    <a href="https://github.com/PaidSites/investmentu2019/issues">Request a Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

- [Table of Contents](#table-of-contents)
- [About The Project](#about-the-project)
  - [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Production Notes](#production-notes)
- [Roadmap](#roadmap)
- [Project Lead](#project-lead)

<!-- ABOUT THE PROJECT -->
## About The Project

[![InvestmentU Screen Shot][product-screenshot]](https://investmentu.com)
> valid as of 2019.12.16

The InvestmentU website is one of our longest-running sites, and got a redesign in 2019 in order to capitalize on its high domain authority.  It now serves as a content-aggregator site, using posts from many of our other franchises to build on SEO efforts across the Oxford Group.

### Built With

* [WordPress](https://wordpress.org)
* [Apache 2.4](https://apache.org/)
* [php 7.2](https://php.net)
* [make](https://www.gnu.org/software/make/)
* [Jenkins](https://jenkins.io)
* [AWS EC2](https://aws.amazon.com/ec2/)

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these steps.

### Prerequisites

You will need access to:
* apache (>=2.4)
* php (>= 7.2)
* mysql

You can use "bare-metal" installation, or set up docker/vagrant for your local webserver environment.

For the database, you may either use an SSH tunnel connected to the `bluecrab.pro` development server and the RDS serverless credentials, or you may use a local version.  If you opt to use the tunnel, please be mindful of any ongoing efforts in the development server and post to Slack if you intend to make changes there.

### Installation

1. Clone the repo
```sh
git clone https://github.com/PaidSites/investmentu2019
```
2. Install WordPress
_If you have php and the WP CLI installed locally, you can run WP CLI commands for this step_
```sh
wp core download
```
3. Configure WordPress for local development

## Production Notes

The SEO team shifted the original site's content around somewhat, resulting in a large number of `401 Gone` and `301 Permanently Redirected` requests.  We resolved this by way of mapfiles linked in the `VirtualHost` directive for ths site.  Those mapfiles currently live in the [utilities](https://github.com/PaidSites/utilties) repo.

If you experience any weirdness around URLs or redirection, this might be a good place to start your search for answers.

<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/PaidSites/investmentu2019/issues) for a list of proposed features (and known issues).

See the [Asana board]() for open issues in Asana.

<!-- Project "Owner" -->
## Project Lead

(currently unassigned - adopt me!)

Project Link: [https://github.com/PaidSites/investmentu2019](https://github.com/PaidSites/investmentu2019)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/contributors.svg?style=flat
[contributors-url]: https://github.com/PaidSites/investmentu2019/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/PaidSites/investmentu2019.svg?style=flat
[forks-url]: https://github.com/PaidSites/investmentu2019/network/members
[stars-shield]: https://img.shields.io/github/stars/PaidSites/investmentu2019.svg?style=flat
[issues-shield]: https://img.shields.io/github/issues/PaidSites/investmentu2019.svg?style=flat
[issues-url]: https://github.com/PaidSites/investmentu2019/issues
[product-screenshot]: images/screenshot.png
[product-logo]: images/logo.jpg