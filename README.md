<img src="https://cloud.githubusercontent.com/assets/2805249/12291425/e1430a16-ba32-11e5-950e-7887df7a75e9.png" width="200">

[![Build Status](https://travis-ci.org/enzyme/axiom.svg?branch=master)](https://travis-ci.org/enzyme/axiom)
[![Coverage Status](https://coveralls.io/repos/enzyme/axiom/badge.svg?branch=master&service=github)](https://coveralls.io/github/enzyme/axiom?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/enzyme/axiom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/enzyme/axiom/?branch=master)

Axiom is a collection of PHP PSR-2 compliant interfaces and classes designed to help you flesh out domain driven projects. Sticking to a framework like Axiom will help keep all your projects consistent in their layout, design and implementation, hopefully making your job (and others working on your code) easier.

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
These exceptions are thrown by the collection of concrete classes included when internal errors occur.

#### Factories
A factory is responsible for the creation and modification of models. It has intimate knowledge of how a model is built and the various attributes it acquires.

#### Models
Models represent objects in your domain. They are unique, have a set of attributes and are the primary resource of your application.

#### Recipients
Recipients are parts of your system that require knowledge of when a model is either successfully or unsuccessfully created, updated or destroyed after they have initiated a command.

#### Reports
Reports are containers that carry a message and optional details associated with the outcome of some event or action in your domain. For example, when a model failed to be created, a FailureReport can be returned with the details of what went wrong.

#### Repositories
Repositories are model collections that allow the system to store and retrieve models from an underlying persistence layer.

# Concrete classes
There are a couple concrete classes included with Axiom that you can use straight out of the box. These are:

#### Atoms
* IntegerAtom - represents an integer value. This does not include floats.
* StringAtom - represents a string, either empty or of any size.

#### Bags
* ArrayBag - simply stores a collection of key/value pairs using an internal native array.

#### Reports
* SimpleReport - provides a basic report implementation that stores a message and optional details.
* FailureReport - extends the simple report and is purely a more readable means of reporting a failure.

#### Repositories
* InMemoryRepository - stores a collection of models in-memory using a simple array.

# Generators

Axiom comes with a set of command line generators for quickly creating skeleton implementations of the various interfaces included.

To use the command like tool, run it from the console at the root of your project as:

```bash
php vendor/bin/axiom list
```

When create a resource using the command line tool, you can either specify the namespace and location of the file using the optional parameters `--location=LOCATION` and `--namespace=NAMESPACE` or using an `axiom.yaml` config file (recommended).

#### axiom.yaml

The axiom.yaml file lays out the structure for your generated classes and looks something like:

```yaml
repositories:
    - namespace: Acme\Repositories
    - location: /Users/enzyme/code/acme/Repositories
factories:
    - namespace: Acme\Factories
    - location: /Users/enzyme/code/acme/Factories
bags:
    - namespace: Acme\Bags
    - location: /Users/enzyme/code/acme/Bags
atoms:
    - namespace: Acme\Atoms
    - location: /Users/enzyme/code/acme/Atoms
reports:
    - namespace: Acme\Reports
    - location: /Users/enzyme/code/acme/Reports
models:
    - namespace: Acme\Models
    - location: /Users/enzyme/code/acme/Models
```

When generating a class using the command line tool and no entry for the class type is found in the `axiom.yaml` (optional) file or through the command line parameter, an exception will be thrown.

# Contributing

Please see CONTRIBUTING.md

# License

MIT, see LICENSE
