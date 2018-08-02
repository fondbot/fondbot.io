# Introduction

[[toc]]

## Overview

FondBot is a framework for building chat bots. 
As the main goal of this project is to provide an elegant and flexible architecture to develop and maintain chatbots, FondBot is powered by the Laravel framework which gives a developer access to many ready and solid components.
Cache, Database, Queue are the main ones required to develop modern chatbots.

In this documentation we will not cover Laravel related topics, so if you need assistance with Laravel go through it's official [documentation](https://laravel.com/docs/5.5).

## Features

* Intents
* Built-in finite state machine (conversation system)
* Asynchronous message sending
* Drivers: Facebook, Telegram, VK Communities and more...

## Release Management & Version Lifecycle

FondBot strictly follows [semantic versioning](http://semver.org). 

Branches are created using the following pattern: [MAJOR].[MINOR]

Release tags are never deleted. 

Each minor release makes the previous one unsupported.
Unsupported releases do not receive bug & security fixes. 

| Version | Receives fixes |
|---------|----------------|
| 1.0     | No             |
| 1.1     | No             |
| 1.2     | Yes            |
| 2.0     | No             |
| 2.1     | Yes            |

Upcoming minor release branch is master.
Upcoming major release branch is develop. 

## Community

Join our open Slack channel:
[https://fondbot.signup.team](https://fondbot.signup.team)