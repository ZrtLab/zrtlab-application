class freetds {
    package { 'freetds-common':
        ensure => installed,
        require => Exec["manager update"]
    }
    
    package { 'freetds-bin':
        ensure => installed,
        require => Exec["manager update"]
    }
    
    package { 'unixodbc':
        ensure => installed,
        require => Exec["manager update"]
    }
}
