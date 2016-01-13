<p align="center">
    <img src="https://cloud.githubusercontent.com/assets/2805249/12291425/e1430a16-ba32-11e5-950e-7887df7a75e9.png" width="200">

    [![Build Status](https://travis-ci.org/enzyme/axiom.svg?branch=master)](https://travis-ci.org/enzyme/axiom)
    [![Coverage Status](https://coveralls.io/repos/enzyme/axiom/badge.svg?branch=master&service=github)](https://coveralls.io/github/enzyme/axiom?branch=master)
    [![Code Coverage](https://scrutinizer-ci.com/g/enzyme/axiom/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/enzyme/axiom/?branch=master)

    A set of interfaces & classes for creating domain driven projects.
</p>

# What is it?

Axiom is a set of PHP interfaces and classes designed to help you flesh out domain driven projects faster. Your project doesn't even necessarily need to be domain driven either; any project that requires a scalable & maintainable code base can benifit from using the design practices implemented by Axiom. So go nuts!

# Installation

```bash
composer require enzyme/axiom
```

# Breakdown

#### Atoms

Atoms are wrappers around some common native types, such as the integer, string and boolean. You'll use atoms where you expect these types and want to assume that the value being passed in is already valid. Valid in this case being the actual type, so if your models are identified by integer ID's, you don't want to be passed the string 'foo'. This saves you from needing to muddy up your code with `if (is_numeric($id)) { ... }` checks etc.

#### Carriers

Carriers are data containers that hold information generally supplied by the user or an external service. Carriers are passed to factories, repositories, commands etc instead of the raw data to help decouple them. If your factory is expecting a carrier, it doesn't need to care now if that carrier was hydrated with data from an API call, an HTML form or from an CLI command, it just knows it has the data it needs to do it's job.

# Roadmap
- [ ] Finish readme/documentation.
- [ ] Generate Interface/Class references.
- [ ] Create first release candidate.
