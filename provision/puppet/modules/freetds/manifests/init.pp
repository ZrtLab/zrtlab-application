class freetds {
    package { 'freetds-common':
        ensure => installed,
        required => Exec["manager update"]
    }
    
    package { 'freetds-bin':
        ensure => installed,
        required => Exec["manager update"]
    }
    
    package { 'unixodbc':
        ensure => installed,
        required => Exec["manager update"]
    }
}
