# ScanEat Mobile Application
Laravel Back-end Web API to be used by the Scan Eat Mobile Application.

## The API
This API allow for the secure storage of user details, with Laravel Passport (an OAuth2.0 implementation) being used to authenticate users from the mobile application.
The API gathers its information as needed from the OpenFoodFacts public API. This data is then parsed and cached locally.

It keeps track of any dietary information regarding products, as well as any allergens if present.
When a user scans a product, it is added to their history for their future reference.
They also have the choice to save products to a seperate list.

Users custom preference are saved to the API in order to persist this information across sessions and devices. 
All communication to the application is sent via JSON.

## The Development
This project was created for my dissertation project for my third year at Swansea University. It was designed and developed following a Test Driven Development methodology. This repository contains one half of the full system, The remaining portion of the project can be found under the scan_eat_app repository.
