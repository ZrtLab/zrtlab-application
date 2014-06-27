class curl {
    package { 'curl':
        ensure => installed,
        required => Exec["manager update"]
    }
}
