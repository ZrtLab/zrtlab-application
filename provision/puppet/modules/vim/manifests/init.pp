class vim {
    package { 'vim':
            ensure => installed,
            required => Exec["manager update"]
    }
}
