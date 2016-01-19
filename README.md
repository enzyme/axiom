<img src="https://cloud.githubusercontent.com/assets/2805249/12291425/e1430a16-ba32-11e5-950e-7887df7a75e9.png" width="200">

[![Build Status](https://travis-ci.org/enzyme/axiom.svg?branch=master)](https://travis-ci.org/enzyme/axiom)
[![Coverage Status](https://coveralls.io/repos/enzyme/axiom/badge.svg?branch=master&service=github)](https://coveralls.io/github/enzyme/axiom?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/enzyme/axiom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/enzyme/axiom/?branch=master)

A set of interfaces & classes for creating domain driven projects.

# What is it?

Axiom is a set of PHP interfaces and classes designed to help you flesh out domain driven projects faster. Your project doesn't even necessarily need to be domain driven either; any project that requires a scalable & maintainable code base can benifit from using the design practices implemented by Axiom. So go nuts!

# Installation

```bash
composer require enzyme/axiom
```

# Breakdown

#### Atoms

Atoms are wrappers around some common native types such as integers, strings and booleans. You'll use atoms when your code expects these types and wants to assume that the value being passed in is already valid. "Valid" in this case being the actual type is correct. So if your models for example are identified by integer ID's, you don't want to be passed the string 'foo'. This saves you from needing to dirty up your code with numerous `if (is_numeric($id)) { ... }` checks etc, you can just get down to business.

#### Carriers

Carriers are data containers that hold information generally supplied by the user or an external system. Carriers are passed to factories, repositories, commands etc instead of the raw data object to help decouple your business logic from your inlets. If your factory is using a carrier, it won't care if that carrier was hydrated with data from an API call, an HTML form or a CLI command.

#### Factories

Factories are what you'd expect, they simply make or update instances from the supplied data.

#### Handlers

Handlers are classes that handle the outcome of a particular operation, either Create, Update or Destroy. If your controller implements the create handler interface and dispatches a create new model command, it can then be notified by the command of the outcome. You'd pass a reference to the handler class to your command or other service doing the reporting.

#### Models

Models are your domain objects, store data about themselves and their relationships and are identified by a unique integer, string etc.

#### Reports

Reports are passed along with certain operations that require some form of well... reporting. For example, if the creation of a model fails, you can pass a FailureReport back to the handling class describing what the problem was (maybe the user's input couldn't be validated correctly).

#### Repositories

Repositories form an abstraction of your persistence layer. Classes requesting models from a repository just want the model, they don't care if it came from a database, text file or from memory.
