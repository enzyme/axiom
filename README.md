<img src="https://cloud.githubusercontent.com/assets/2805249/12291425/e1430a16-ba32-11e5-950e-7887df7a75e9.png" width="200">

[![Build Status](https://travis-ci.org/enzyme/axiom.svg?branch=master)](https://travis-ci.org/enzyme/axiom)
[![Coverage Status](https://coveralls.io/repos/enzyme/axiom/badge.svg?branch=master&service=github)](https://coveralls.io/github/enzyme/axiom?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/enzyme/axiom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/enzyme/axiom/?branch=master)

A set of interfaces & classes for creating domain driven projects.

# What is it?

Axiom is a set of PHP interfaces and classes designed to help you flesh out domain driven projects faster.

# Installation

```bash
composer require enzyme/axiom
```

# What's included

#### Atoms
Atoms are wrappers around native php variable types such as int and string. They are used when a service or class expects one of these values and doesn't want to litter the code with type checks such as `if (is_string($var)) {...}`.

#### Bags
Bags are used to carry data around the system, whether from the user, an API or an external service.

#### Exceptions
These exceptions are thrown by the collection of concrete classes included with Axiom when internal errors occur.

#### Factories
A factory is responsible for the creation and modification of models. It has intimate knowledge of how a model is built and the various attributes it acquires.

#### Models
Models are a container that describes a part of your domain. It has attributes and each model is unique.

#### Recipients
Recipients are parts of your system that require knowledge of when a model is either successfully or unsuccessfully created, updated or destroyed after they have initiated the action.

#### Reports
Reports are containers that carry a message and optional associated details associated with the outcome of some event or action in your domain. For example, when a model failed to be created, a FailureReport can be returned with the details of what went wrong (eg: the user provided data that did not validate).

#### Repositories
Repositories are collections that allow the system to store and retrieve models. They are the layer that abstracts away the persistence of the models themselves, whether that be to a database, a file or simply in-memory.

# Concrete classes
There are a couple concrete classes included with Axiom that you can use straight out of the box. These are:

#### Atoms
* IntegerAtom - represents an integer value. This does not include floats etc.
* StringAtom - represents a string, either empty or of any size.

#### Bags
* ArrayBag - simply stores a collection of key->value pairs using an array internally.

#### Reports
* SimpleReport - provides a basic report implementation that stores a message and optional details.
* FailureReport - extends the simple report and is purely a means of reporting a failure.

#### Repositories
* InMemoryRepository - stores a collection of models in-memory using a simple array.

# Contributing

Please see CONTRIBUTING.md

# License

MIT, see LICENSE
