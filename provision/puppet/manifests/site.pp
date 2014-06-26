$domain_name = "local.test-zend.com"
$domain_alias = "local.m.test-zend1.com"

$mysqlPassword = ""

Exec { 
    path => [
            "/usr/bin", "/bin", "/usr/sbin", 
            "/sbin", "/usr/local/bin", "/usr/local/sbin"
            ]
}

class { 'apt': always_apt_update => true }

class system::update {
  $packages = [ "build-essential" ]
  package { $packages:
    ensure  => present,
    require => Class["apt::update"],
  }
}

include system::update
include git
include wget
include curl
include sqlite
include php
include apache
include vim
include mysql

wget::fetch { "get composer":
    source      => 'https://getcomposer.org/composer.phar',
                destination => '/var/www/src/composer.phar',
                timeout     => 0,
                verbose     => false,
}
