# Clock Widget Module

## Overview

The Clock Widget module is a custom Drupal module that allows site builders to add clock widgets displaying the current time in different timezones to their site's sidebar. The module fetches data from the World Clock API and displays times for Eastern Standard Time (EST) and Coordinated Universal Time (UTC).

## Features

- Dynamic Timezone Data Fetching: The module queries the World Clock API to pull current time data for the specified time zones.
- Customizable Display: Site builders can choose which clocks to display on specific pages.
- Custom Styling: Basic CSS and JS files are provided for styling and dynamic interaction of the clock widgets.
- Caching: The module includes a caching strategy to minimize API requests and improve performance.

## Requirements

- Drupal 8, 9, or 10

## Installation

1. Download and place the `clock_widget` module in your site's `modules/custom` directory.
2. Navigate to `Extend` in the admin menu and enable the `Clock Widget` module.

## Configuration

1. Go to `Structure` > `Block Layout`.
2. Place the `Clock Block` in a region (e.g., Sidebar).
3. Configure the block settings to choose which clocks (EST, UTC) to display.

## File Structure

clock_widget/
├── clock_widget.info.yml
├── clock_widget.module
├── src/
│ ├── Controller/
│ │ └── ClockController.php
│ ├── Plugin/
│ │ └── Block/
│ │ └── ClockBlock.php
├── templates/
│ └── clock-widget.html.twig
├── css/
│ └── clock_widget.css
├── js/
│ └── clock_widget.js
├── clock_widget.theme
├── clock_widget.libraries.yml


## Usage

1. After placing the block, the current time for the selected timezones will be displayed on the specified pages.
2. The time is fetched dynamically from the World Clock API: 
   - EST: `http://worldclockapi.com/api/json/est/now`
   - UTC: `http://worldclockapi.com/api/json/utc/now`

## Customization

### CSS

You can customize the appearance of the clock widgets by modifying the `css/clock_widget.css` file.

### JavaScript

You can add custom JavaScript interactions by modifying the `js/clock_widget.js` file.

## Caching

The module uses caching to store the time data for an hour (3600 seconds). You can adjust the caching duration by modifying the `getCacheMaxAge` method in `src/Plugin/Block/ClockBlock.php`.

## Troubleshooting

- If the time is not displaying correctly, check the Drupal logs for errors related to the World Clock API request.
- Ensure that the API endpoints are accessible from your server.

## Maintainers

- Sunny - infoofsunnysharma@gmail.com
