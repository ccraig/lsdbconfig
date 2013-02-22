lsdbconfig
==========

Lemonstand module to allow configuring your database via a file instead of the config_tool.

## Installation ##
- Clone/download lsdbconfig into the modules directory of your Lemonstand installation.
- Add your own code to the getDatabaseInformation() method.
- The getDatabaseInformation() must return an array with values for keys: host, user, password and the database's name.
- For reference, my configs for [MAMP](http://www.mamp.info/), [AppFog](https://www.appfog.com/) and [Pagodabox](https://pagodabox.com/) have been included.

## Why? ##
I wrote this module because Lemonstand's config_tool is not configuarable via environment variables, which are a key part of hosting with today's PaaS.
