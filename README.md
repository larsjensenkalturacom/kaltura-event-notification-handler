# kaltura-event-notification-handler
Using Kaltura Event Notifications to perform transformations on entries

Project provided as-is, not officially supported or maintained by Kaltura - proceed with caution (!)

This project is based on the Kaltura Event Handler with some code updates and changes
https://github.com/kaltura/http-notification-handler/tree/master/php/kaltura-api-notifications-handler-php

Using the PHP NameSpaces Kaltura Client Library
https://github.com/kaltura/KalturaGeneratedAPIClientsPHP

Read more in the Event Handler Readme
https://github.com/kaltura/DeveloperPortalDocs/blob/master/documentation/Integration-Scheduling-and-Hooks/how-handle-kaltura-server-notifications-in-php.md 

Example Custom Metadata Schema provided as png and xml

Example HTTP Event Notification configuration  provided as png

Some of the changes performed:
- Changed Kaltura Service URL to HTTPS
- Added logic to evaluate owner ID and update custom metadata schema to identify content owner as 'faculty', 'student' or 'other'
- Using a regex to extract important information (entry id) from the HTTP notification and saving it in the array format expected by the original event handler project
