Police Activities League Program Involvement Tracking Project



Table of Contents

| 1        Introduction        |
| --- |
| 1.1        Overview        |
| 1.2        Goals and Objectives        |
| 1.3        Scope        |
| 2        General Design Constraints        |
| 2.1        Product Environment        |
| 2.2        User Characteristics        |
| 2.3        Mandated Constraints        |
| 2.4        Potential System Evolution        |
| 3        Nonfunctional Requirements        |
| 3.1        Performance Requirements        |
| 3.2        Security Requirements        |
| 3.3        Safety Requirements        |
| 3.4        Legal Requirements        |
| 3.5        Other Quality Attributes        |
| 3.6        External Interface        |
| 3.6.1        User Interface        |
| 3.8.2        Administrator Interface        |
| 4        System Features        |
| 4.1        Feature: Users Database        |
| 4.2        Feature: Books Database        |
| 5        USE CASE        |
| 5.1       Use-case: New Registrant |
| |
| 5.2       Use-case: User Login |
| |



# 1Introduction

## 1.1Overview

This document defines the requirements for Marconi Book currently under development for ITI G.Marconi high school. This document is designed to be beneficial to both the user/customer as well as the development team. From this document the user will be able to determine our understanding of the requirements and verify their accuracy. The development team will be able to use it while developing the software system to ensure that the customer receives the expected product.



## 1.2Goals and Objectives

Goals:

1. Develop database in a format that is maintainable and updatable by customer.
2. Provide a quick and reliable login system
3. Develop a user interface that allows customer to add and search books in a easy way
4. Develop an online payment method.

## 1.3Scope

Marconi Book will provide the ability to buy and sell textbooks on an easy web site page, where users can add and search their products from an always updated catalog.





# 2General Design Constraints

## 2.1Product Environment

Marconi Book will be hosted on the school&#39;s server. Administrators will be able to access the information contained in the database, and to modify web pages as well as to improve the design or the performance of the project.

## 2.2User Characteristics

**Common Users** – students with the ability to create an account and to add or buy books.



**Administrators** – (with PHP and HTML knowledge). These users will be accessing the database and the source code of the web pages, with the ability to work on the project.

## 2.3Mandated Constraints

There are no constraints at this time. However, there are still key decisions which need to be made (by the customer) which may impose constraints.

## 2.4Potential System Evolution

The PALPIT software will most likely be updated in the following ways:

- .Add an online payment method.
- .Add additional user features
- .Add an online chat system.

# 3Nonfunctional Requirements

## 3.1Performance Requirements

No requirements for speed have been set forth.

Memory requirements will be nominal (exact size is not known at this time) as the database will be holding information for approx. 1000 people. Queries on this database should take no more than 5 seconds.

## 3.2Security Requirements

Only one type of user will have access to the database information. Therefore, only one user level is needed. The database will hold some confidential information about the users and only administrators who are authorized to see the information should have access to it.

## 3.3Safety Requirements

There are no safety requirements at this time.

## 3.4Legal Requirements

(See security requirements)

## 3.5Other Quality Attributes

The Database must be maintained clean: fake accounts or fake books&#39; sale announcement must be quickly deleted by administrators.







## 3.6External Interface

### 3.6.1User Interface

Youth Interface-

The user will provide the following options:

- .Login or Identification section
- .Add book button
- .Search book button
- .Profile management section

# 43.6.2 Administrator Interface-

The interface, in addition to the options present in the User interface, will provide the following options:

- .Ability to delete a books&#39; sale announcement
- .Ability to delete a user&#39;s account

# 5System Features

## 5.1Feature: Users Database

The User Database will be where all of the information about the users will be kept. This section describes how new registrant information will be added to the database.

## 5.2Feature : Books Database

The Books Database will be where all of the information about the books will be kept. This section describes how new registrant information will be added to the database.

# 6USE CASE

## 6.1 Use-case: New Registrant

**Description:** The use-case begins when an unregistered user visit for the first time the web site.

Path:

1. The user will fill with the required data the registration form that is present in the first page.
2. The user has now create his personal account and he is able to enter in Marconi Book and surf in it.
3. The information will be recorded in the database for his next login.

## 6.2Use-case: User login

**Description:** The use-case begins when an already registered user login in the web site.

Basic Path:

1. The user fill the login form with his personal credentials.
2. His account&#39;s data is retrieved from the database and the user log into his account.
