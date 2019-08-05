## CF Get2Cookie

The CF Get2Cookie plugin searches the URL on page load and looks for GET variables, and if the GET variables have been set in the settings page it will set a cookie for 1 year from the time the user's browser hits the URL.  GET variables are variables set in the URL in a users browser.  The URL http://example.com/stuff/?key=value has a GET variable of key=value.

### Adding Cookies

To add new cookie checks, navigate to the CF Get2Cookie settings page. WP-Admin->Settings->CF Get2Cookie.  The settings page provides 2 sections for cookies, Adding New Cookies and Removing Cookies.  The Add New Cookies section tells the code to look for the specific GET variables and will add a cookie with an expiration of 1 year.  The Remove Cookies section tells the code to look for the specific GET variables and will remove the cookie.

#### Entering Cookies for Addition/Removal

- Navigate to the CF Get2Cookie settings page
- To Add a new cookie for addition/removal click the Add New Row button
- The Following options will be available in the new row
	1.  GET Key (Required)
		- The GET key is the first part of the URL GET Variable.  With the URL example above, the GET Key is "key"
	2.  GET Value (Optional)
		- The GET value is the second part of the URL GET Variable.  With the URL example above, the GET Value is "value"
		- This setting is optional as a URL GET value is not needed, but it is strongly recommended
	3.  COOKIE Key (Required)
		- The COOKIE key is the key set in the browser for identifying the COOKIE
	4.  COOKIE Value (Required)
		- The COOKIE value is the key set in the browser for identifying the COOKIE
		- NOTE: The COOKIE Key and COOKIE Value must be set the same in the Add and Remove sections for proper functionality.
	5.  Description (Optional)
		- The Description is an optional field for inputting notes about the cookies
- After all changes to the cookies are complete, click the Save Settings button to save changes
		
#### Removing Cookies From Settings

To remove a cookie setting from the Addition/Removal section, click the Delete button.  The browser will prompt for confirmation to delete.  Then click the Save Settings button to save changes

### WP Super Cache

The plugin also has added the capability to integrate with the WP Super Cache plugin.  It integrates by adding the cookie values for a specific user's browser based on the cookies set in the plugin.  This way if specific cookies are needed to display different content on the site, they will be honored by the Super Cache plugin.