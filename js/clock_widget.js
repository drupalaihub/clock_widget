(function ($, Drupal) {
  Drupal.behaviors.clockWidget = {
    attach: function (context, settings) {
      function updateClock(timezone, elementId, label) {
        $.ajax({
          url: 'https://worldtimeapi.org/api/timezone/' + timezone,
          success: function (data) {
            console.log('Fetched data for timezone:', timezone, data);
            var date = new Date(data.datetime);
            var options = { timeZone: timezone, year: 'numeric', month: 'numeric', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            var formattedTime = date.toLocaleString('en-US', options);
            $('#' + elementId).text(label + ': ' + formattedTime);
          },
          error: function(xhr, status, error) {
            console.log('Error fetching time for timezone:', timezone);
            console.log('Status:', status);
            console.log('Error:', error);
            $('#' + elementId).text('Failed to load time');
          }
        });
      }

      // Check if the EST clock should be displayed.
      if ($('#clock-widget-est').length) {
        updateClock('America/New_York', 'clock-widget-est', 'EST');
      }

      // Check if the UTC clock should be displayed.
      if ($('#clock-widget-utc').length) {
        updateClock('Etc/UTC', 'clock-widget-utc', 'UTC');
      }
    }
  };
})(jQuery, Drupal);
