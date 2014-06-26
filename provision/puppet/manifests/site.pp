$domain_name = "local.test-zend.com"
$domain_alias = "local.m.test-zend1.com"

$mysqlPassword = ""

Exec { path => "/usr/bin:/usr/sbin/:/bin:/sbin" }

exec { "apt-update":
    command => "apt-get update",
    before  => Stage["main"],
}

include mysql
include git
include wget
include php
include apache
include vim

wget::fetch { "get composer":
       source      => 'https://getcomposer.org/composer.phar',
       destination => '/var/www/src/composer.phar',
       timeout     => 0,
       verbose     => false,
    }
