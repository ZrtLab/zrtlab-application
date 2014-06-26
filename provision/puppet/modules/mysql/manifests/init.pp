class mysql 
{
    $mysqlPassword = ""
 
    package 
    { 
        "mysql-server":
            ensure  => present,
    }

    service 
    { 
        "mysql":
            enable => true,
            ensure => running,
            require => Package["mysql-server"],
    }

    exec
    {
    	"set-mysql-password":
            onlyif => "mysqladmin -uroot -proot status",
            command => "mysqladmin -uroot -proot password $mysqlPassword",
            require => Service["mysql"],
    }

    exec 
    { 
        "create-default-db":
            unless => "mysql -uroot -p$mysqlPassword database",
            command => "/usr/bin/mysql -uroot -p$mysqlPassword -e 'create database `database`;'",
            require => [Service["mysql"], Exec["set-mysql-password"]]
    }

    exec 
    { 
        "grant-default-db":
            command => "mysql -uroot -p$mysqlPassword -e 'grant all on `database`.* to `root@localhost`;'",
            require => [Service["mysql"], Exec["create-default-db"]]
    }
}
