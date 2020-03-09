# Test Case Specification for Marconi Book

20 Gennaio 2020

Prepared by: Mattia Sandrini

# Revision History

| Version | Date | Name | Description |
| --- | --- | --- | --- |
| 1 | 11/01/2020 | Mattia Sandrini | Initial Document |
| 2 | 27/01/2020 | Matia Sandrini | Updated test case numbers to eliminate typographical errors |



# 1 Introduction

This document provides the test cases to be carried out for the Marconi Books web site.  Each item to be tested is represented by an individual test case.  Each case details the input and expected outputs.


# 2 Test Cases: Login System

| Test ID | 2.1 |
| --- | --- |
| Title | Correct Login |
| Feature | Login to the web site |
| Objective | Confirm that proper user id an password yields access to the website as expected. |
| Test Data | Login informationUsername = usernamePassword = password |
| Test Actions | 1. Open the web site page2. Select Login option3. Enter login information |
| Expected Results | System lets the user to enter the web site. |


| Test ID | 2.2 |
| --- | --- |
| Title | Incorrect Password |
| Feature | Login to the web site |
| Objective | Confirm that valid user id with an invalid password denies access to the website without leaving the user stranded. |
| Test Data | Correct username, incorrect passwordUsername = usernamePassword = password |
| Test Actions | 1. Open the web site page2. Select Login option3. Enter login information |
| Expected Results | System displays error message with option to try again. |



# 3 Test Cases: Searching &amp; Adding

| Test ID | 3.1 |
| --- | --- |
| Title | Searching |
| Feature | Find the book |
| Objective | Find the book you are looking for using specific criteria |
| Test Data | Book informationBook&#39;s name = name Book&#39;s subject = subject |
| Test Actions | 1. Go to search section.2. Enter book information3. Press search button |
| Expected Results | Site displays the list of books that meet the chosen criterion |

| Test ID | 3.2 |
| --- | --- |
| Title | Adding |
| Feature | Add a book |
| Objective | Add the book to the database to make it available for sale |
| Test Data | Book informationBook&#39;s name = name Book&#39;s subject = subject |
| Test Actions | 1. Go to add section.2. Enter book information3. Press add button |
| Expected Results | Site adds the book to its book&#39;s database |
