<?php
defined('BASEPATH') OR exit('No direct script access allowed!');
$db_config ='
<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the \'Database Connection\'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	[\'dsn\']      The full DSN string describe a connection to the database.
|	[\'hostname\'] The hostname of your database server.
|	[\'username\'] The username used to connect to the database
|	[\'password\'] The password used to connect to the database
|	[\'database\'] The name of the database you want to connect to
|	[\'dbdriver\'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	[\'dbprefix\'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	[\'pconnect\'] TRUE/FALSE - Whether to use a persistent connection
|	[\'db_debug\'] TRUE/FALSE - Whether database errors should be displayed.
|	[\'cache_on\'] TRUE/FALSE - Enables/disables query caching
|	[\'cachedir\'] The path to the folder where cache files should be stored
|	[\'char_set\'] The character set used in communicating with the database
|	[\'dbcollat\'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	[\'swap_pre\'] A default table prefix that should be swapped with the dbprefix
|	[\'encrypt\']  Whether or not to use an encrypted connection.
|
|			\'mysql\' (deprecated), \'sqlsrv\' and \'pdo/sqlsrv\' drivers accept TRUE/FALSE
|			\'mysqli\' and \'pdo/mysql\' drivers accept an array with the following options:
|
|				\'ssl_key\'    - Path to the private key file
|				\'ssl_cert\'   - Path to the public key certificate file
|				\'ssl_ca\'     - Path to the certificate authority file
|				\'ssl_capath\' - Path to a directory containing trusted CA certificats in PEM format
|				\'ssl_cipher\' - List of *allowed* ciphers to be used for the encryption, separated by colons (\':\')
|				\'ssl_verify\' - TRUE/FALSE; Whether verify the server certificate or not (\'mysqli\' only)
|
|	[\'compress\'] Whether or not to use client compression (MySQL only)
|	[\'stricton\'] TRUE/FALSE - forces \'Strict Mode\' connections
|							- good for ensuring strict SQL while developing
|	[\'ssl_options\']	Used to set various SSL options that can be used when making SSL connections.
|	[\'failover\'] array - A array with 0 or more data for connections if the main should fail.
|	[\'save_queries\'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the \'default\' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$active_group = \'default\';
$query_builder = TRUE;';

$db_autoload ='
<?php
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload[\'packages\'] = array(APPPATH.\'third_party\', \'/usr/local/shared\');
|
*/
$autoload[\'packages\'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| \'database\' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload[\'libraries\'] = array(\'database\', \'email\', \'session\');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload[\'libraries\'] = array(\'user_agent\' => \'ua\');
*/
$autoload[\'libraries\'] = array(\'database\',\'session\');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload[\'drivers\'] = array(\'cache\');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload[\'drivers\'] = array(\'cache\' => \'cch\');
|
*/
$autoload[\'drivers\'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload[\'helper\'] = array(\'url\',\'file\');
*/
$autoload[\'helper\'] = array(\'url\');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload[\'config\] = array(\'config1\', \'config2\');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload[\'config\'] = array(\'settings\', \'version\');

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload[\'language\'] = array(\'lang1\', \'lang2\');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array(\'codeigniter\');
|
*/
$autoload[\'language\'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload[\'model\'] = array(\'first_model\', \'second_model\');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload[\'model\'] = array(\'first_mode\' => \'first\');
*/
$autoload[\'model\'] = array();
';
