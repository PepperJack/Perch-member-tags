# Perch: Member Tags

This is a small app for the Perch CMS ([grabaperch.com](https://grabaperch.com)) to allow an administrator to view and edit all the tags that are currently used by the Perch Members app.

## Important Stuff

Perch or Perch Runway v2.8.29 or above must be installed (as per the Members app v1.5).

Perch Members app v1.5 must be installed.

This app directly modifies the Perch Members database tables - there is no public api available for this, so if the Perch developers upgrade the Members app and modify the tables, this app may not work. Be aware.

I provide no warranty (or promise of a higher state of consciousness) if you use this app. 

## Setup

Ensure the Perch Members app is installed.

Copy the `pepperjack_tags` folder into the `perch/addons/apps/` folder (or if you've renamed your perch folder, copy into the whateveryournewnamefortheperchfolderis/addons/apps/ folder).

If an administrator has the privilege "manage members", they will also be able to use this app.

## How to use

Login to the Perch control panel as a user with the privilege "manage members".

Click on the `Apps` menu and select `Members Tags` (if you're lucky, it might be underneath Members in the list).

You will hopefully be presented with a list of the tags that have been assigned to members in the Members app. If not, add some tags to members. In the Members app.

If a tag has _not_ been assigned to any members, you will have the ability to delete the tag. Delete means delete in this case - no soft delete round these parts.

Click on a tag name to edit the tag display text - **be careful though - if you change the tag name and it's referenced in your code, your code might work.**  
You will also be shown a list of members that have this tag assigned to them. Click on a member name to be taken to their edit page in the Members app.

## Enjoy

This is the end - raise issues on here. Or pull requests if you're brave. Be gentle though...

